<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Setting;
use App\Http\Controllers\Controller;


class FrontController extends Controller
{
    public function index()
    {
        $pageId = 1;
        $post = Post::findOrFail($pageId);
        $postMeta = $post->GetAllMetaData();

        $pages = Post::query()
            ->where('post_type', 'page')
            ->where('post_status', 'publish')
            ->orderBy('menu_order')
            ->latest()
            ->get();


        return view('frontend.front', [
            'post' => $post,
            'postMeta' => $postMeta,
            'pages' => $pages,
        ]);
    }
}
