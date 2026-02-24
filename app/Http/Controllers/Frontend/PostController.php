<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepository;

class PostController extends Controller
{

    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
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


    private function handlePost($slug)
    {
        $post = $this->getPayload($slug);
        $metaDatas = $this->getMetaData($post);

        $homePage = Post::where('slug', 'home')->where('post_status', 'publish')->first();
        $homeMeta = $homePage ? $this->getMetaData($homePage) : [];

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
