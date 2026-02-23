<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MediaRepository;
use App\Repositories\PostRepository;
use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class MediaController extends Controller
{
    private $postType;
    private $postRepository;
    private $mediaRepository;
    private $categoryType;

    public function __construct(PostRepository $postRepository, MediaRepository $mediaRepository)
    {
        // $this->middleware('permission:create_team', ['only' => ['create','store']] );
        // $this->middleware('permission:read_team', ['only' => ['index']] );
        // $this->middleware('permission:update_team', ['only' => ['update','edit']] );
        // $this->middleware('permission:delete_team', ['only' => 'destroy']);

        $this->postType = 'media';
        $this->mediaRepository = $mediaRepository;
        $this->postRepository = $postRepository;
        $this->categoryType = 'sector';
    }

    public function index(Request $request)
    {
        $status = $request->get('status') ? $request->get('status') : 'all';
        $baseQuery = Post::PostType($this->postType);
        $all = $posts = $baseQuery->get();

        switch ($status) {
            case 'publish':
                $posts = $baseQuery->PostStatus('publish')->get();
                break;
            case 'trash':
                $posts = $baseQuery->onlyTrashed()->get();
                break;
            case 'draft':
                $posts = $baseQuery->PostStatus('draft')->get();
                break;
            default:
                break;
        }
        $publishPosts = Post::PostType($this->postType)->PostStatus('publish')->get()->count();
        $trashPosts = Post::PostType($this->postType)->onlyTrashed()->get()->count();
        $draftPosts = Post::PostType($this->postType)->PostStatus('draft')->get()->count();

        return view('backend.media.index-media', [
            'status' => $status,
            'all' => $all,
            'posts' => $posts,
            'draftPosts' => $draftPosts,
            'publishPosts' => $publishPosts,
            'trashPosts' => $trashPosts,
            'postType' => $this->postType,
        ]);
    }

    public function create()
    {
        $type = $this->postRepository->encodeType($this->postType);

        $categories = Category::where('type', $this->categoryType)->get();
        $sectorCategories = Category::where('type', 'sector')->orderBy('name', 'ASC')->get();
        $companies = Post::PostType('company')->PostStatus('publish')->get();


        return view('backend.media.create-media', [
            'type' => $type,
            'categories' => $categories,
            'sectorCategories' => $sectorCategories,
            'companies' => $companies,
        ]);
    }

    public function store(PostStoreRequest $request)
    {
        $type = isset($request->type) ? $this->postRepository->decodeType($request->type) : 'NOT FOUND';

        // check post type exists or not
        $this->postRepository->checkPostTypeExists($type);

        try {

            // check whether click on draft or publish
            $request->merge(['post_status' => $request->input('action')]);

            $post = $this->postRepository->createPost($request, $this->postType);

            $metaDatas = $this->mediaRepository->processMetaData($post, $request);


            foreach ($metaDatas as $key => $value) {
                $this->postRepository->updateOrCreateMeta($post, $key, $value);
            }

            session()->flash('success', 'Media Created.');

            return redirect()->route('backend.media.edit', $post->id);

        } catch (\Exception $e) {

            session()->flash('error', 'Error While Creating: ' . $e->getMessage());
            Log::error($e);
            return redirect()->back();
        }

    }

    public function edit($id)
    {

        $categories = Category::where('type', $this->categoryType)->get();

        $post = Post::with(['categories', 'postMeta'])->where('post_type', 'media')->findOrFail($id);

        $metaDatas = $this->postRepository->getMetaDatas($post);

        $sectorCategories = Category::where('type', 'sector')->orderBy('name', 'ASC')->get();
      
        $companies = Post::PostType('company')->PostStatus('publish')->get();

        return view('backend.media.edit-media', [
            'post' => $post,
            'metaDatas' => $metaDatas,
            'categories' => $categories,
            'sectorCategories' => $sectorCategories,
            'companies' => $companies,
        ]);
    }

    public function update(PostUpdateRequest $request, Post $id)
    {
        try {

            // check whether click on draft or publish
            $request->merge(['post_status' => $request->input('action')]);

            $data = $this->postRepository->updatePost($request, $id, $this->postType);


            if ($data['status'] && $data['post']) {

                $post = $data['post'];

                $metaDatas = $this->mediaRepository->processMetaData($post, $request);


                foreach ($metaDatas as $key => $value) {
                    $this->postRepository->updateOrCreateMeta($post, $key, $value);
                }

                session()->flash('success', 'Media Updated.');

                // return redirect()->route('backend.page.edit', $id);
                return redirect()->back();
            } else {
                session()->flash('error', 'Error While Updating: Unable to update the media.');
            }

        } catch (\Exception $e) {

            session()->flash('error', 'Error While Updating: ' . $e->getMessage());
            Log::error($e);
        }

        return redirect()->back();

    }
}
