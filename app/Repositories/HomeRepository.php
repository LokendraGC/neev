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
        $data['our_vision'] = isset($request->our_vision) ? $request->our_vision : NULL;
        $data['our_vision_description'] = isset($request->our_vision_description) ? $request->our_vision_description : NULL;
        $data['our_mission'] = isset($request->our_mission) ? $request->our_mission : NULL;
        $data['our_mission_description'] = isset($request->our_mission_description) ? $request->our_mission_description : NULL;
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
