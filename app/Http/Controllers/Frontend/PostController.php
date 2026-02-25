<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Helpers\CategoryHelper;

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
            $bod_cat = Category::where('type', 'team_category')->where('id', 1)->first();
            $management_cat = Category::where('type', 'team_category')->where('id', 2)->first();

            $all_teams = Post::where('post_type', 'team')->where('post_status', 'publish')->get();

            $bods = $all_teams->filter(function ($team) use ($bod_cat) {
                if (!$bod_cat) return false;
                $meta = $team->GetAllMetaData();
                $cats = isset($meta['team_categories']) ? unserialize($meta['team_categories']) : [];
                return is_array($cats) && in_array($bod_cat->id, $cats);
            });

            $management_teams = $all_teams->filter(function ($team) use ($management_cat) {
                if (!$management_cat) return false;
                $meta = $team->GetAllMetaData();
                $cats = isset($meta['team_categories']) ? unserialize($meta['team_categories']) : [];
                return is_array($cats) && in_array($management_cat->id, $cats);
            });

            $viewName = $this->getViewName($post, $metaDatas);
            if ($viewName) {
                return view($viewName, [
                    'post' => $post,
                    'metaData' => $metaDatas,
                    'homeMeta' => $homeMeta,
                    'bod_cat' => $bod_cat,
                    'board_of_directors' => $bods,
                    'management_cat' => $management_cat,
                    'management_teams' => $management_teams,
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
