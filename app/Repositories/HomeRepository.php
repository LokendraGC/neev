<?php

namespace App\Repositories;

use App\Models\Category;

class HomeRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {

        $data = [];
        $data['about_subtitle'] = isset($request->about_subtitle) ? $request->about_subtitle : NULL;
        $data['about_title'] = isset($request->about_title) ? $request->about_title : NULL;
        $data['mission_and_vision_details'] = isset($request->mission_and_vision_details) ? serialize($request->mission_and_vision_details) : NULL;
        $data['media_main_title'] = isset($request->media_main_title) ? $request->media_main_title : NULL;
        $data['banners'] = isset($request->banners) ? serialize($request->banners) : NULL;
        $data['business_subtitle'] = isset($request->business_subtitle) ? $request->business_subtitle : NULL;
        $data['business_title'] = isset($request->business_title) ? $request->business_title : NULL;
        $data['business_description'] = isset($request->business_description) ? $request->business_description : NULL;
        $data['business_button_link'] = isset($request->business_button_link) ? $request->business_button_link : NULL;
        $data['business_button_title'] = isset($request->business_button_title) ? $request->business_button_title : NULL;
        $data['media_main_title'] = isset($request->media_main_title) ? $request->media_main_title : NULL;
        $data['media_description'] = isset($request->media_description) ? $request->media_description : NULL;
        $data['banner_main_title'] = isset($request->banner_main_title) ? $request->banner_main_title : NULL;
        
        return $data;
    }
}
