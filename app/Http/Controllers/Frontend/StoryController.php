<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class StoryController extends Controller
{
    public function index($slug)
    {
        $post = Post::where('slug', $slug)->first();

        // return $post;

        if ($post) {

            $metaDatas = $post->GetAllMetaData();

            // return $metaDatas;

            if ($post->post_type === 'page') {

                $pageTemplate = $metaDatas['page_template'];
                $viewName = "frontend.pages.$pageTemplate";

                return view($viewName, [
                    'post' => $post,
                    'metaData' => $metaDatas,
                    'meta' => 2,
                ]);
            }

            if ($post->post_type === 'story') {

                return view('frontend.single-story', [
                    'post' => $post,
                    'postMeta' => $metaDatas,
                ]);
            }
        } else {
            abort(403, 'Not Found');
        }
    }
}
