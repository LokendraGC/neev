<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Setting;
use App\Http\Controllers\Controller;


class FrontController extends Controller
{
    public function index()
    {
        // get home page id for settings
        $pageId = Setting::where('setting_name', 'page_on_front')->value('setting_value');

        // check page id exists or not
        $post = Post::findOrFail($pageId);

        // if exists take meta data of that id
        $postMeta = $post->GetAllMetaData();    


        // $karnalicat = Category::findOrFail(17);
        // $karnaliposts = $karnalicat->posts()->latest()->take(8)->get();


        return view('frontend.front', [
            'pageId' => $pageId,
            'post' => $post,
            'postMeta' => $postMeta,
        ]);
    }

}
