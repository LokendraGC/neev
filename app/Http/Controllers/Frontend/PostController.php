<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index($slug)
    {
        return $this->handlePost($slug);
    }

    public function getPayload($slug)
    {
        $post = Post::query()
            ->whereSlug($slug)
            ->where('post_status', 'publish')
            ->first();

        if (!$post) {
            abort(403, 'Not Found');
        }

        return $post;
    }

    public function getMetaData($post)
    {
        return $post->GetAllMetaData();
    }

    public function getViewName($post, $metaDatas)
    {
        if ($post->post_type === 'page') {
            return "frontend.pages.{$metaDatas['page_template']}";
        }

        return null;
    }

    public function newsIndex($year, $month, $id)
    {
        $post = Post::where([ 'id' => $id, 'post_type' => 'post' ])->first();

        if ( !empty($post) ) {

            $isPublished = $post->post_status == 'publish';
            $isDraft = $post->post_status == 'draft';

            if ( $isPublished || ( $isDraft && auth()->check()) ) {
                $postMeta = $post->GetAllMetaData();
                $latestNews = Post::where('id', '!=', $post->id)
                    ->where([ 'post_type' => 'post', 'post_status' => 'publish' ])
                    ->latest()
                    ->take(5)
                    ->get();

                $relatedPosts = $this->postRepository->getRelatedPosts($post->id);
                return view('frontend.single-post', compact('post', 'latestNews', 'relatedPosts', 'postMeta'));
            }

            if ( $isDraft && !auth()->check() ) {
                abort(403, 'You cannot open draft post');
            }
        }
        abort(404, 'Post not found');
    }

    private function handlePost($slug)
    {
        $post = $this->getPayload($slug);
        $metaDatas = $this->getMetaData($post);

        $homePage = Post::where('slug', 'home')->where('post_status', 'publish')->first();
        $homeMeta = $homePage ? $this->getMetaData($homePage) : [];

        // $teams = Post::where('post_type', 'team')->get();
        // $services = Post::query()
        //     ->where('post_type', 'service')
        //     ->where('post_status', 'publish')
        //     ->orderBy('menu_order')
        //     ->get();



        // $team = Post::where('post_type', 'team')->first();
        // $teamMeta = $team ? $this->getMetaData($team) : [];

        if (request()->is('home')) {
            return redirect('/');
        }
        if ($post->post_type === 'page') {

            $viewName = $this->getViewName($post, $metaDatas);
            if ($viewName) {
                return view($viewName, [
                    'post' => $post,
                    'metaData' => $metaDatas,
                    'homeMeta' => $homeMeta,
                ]);
            }
        }


        if ($post->post_type === 'post') {
            return view('frontend.single-post', [
                'post' => $post,
                'postMeta' => $metaDatas,
            ]);
        }

        abort(403, 'Not Found');
    }
}
