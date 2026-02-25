<?php

namespace App\Repositories;

use App\Models\Category;

class AboutRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {

        $data = [];
        $data['about_title'] = isset($request->about_title) ? $request->about_title : NULL;
        $data['mission_and_vision_details'] = isset($request->mission_and_vision_details) ? serialize($request->mission_and_vision_details) : NULL;
        $data['location_details'] = isset($request->location_details) ? $request->location_details : NULL;
        $data['location_image'] = isset($request->location_image) ? $request->location_image : NULL;
        $data['location_subtitle'] = isset($request->location_subtitle) ? $request->location_subtitle : NULL;
        $data['location_title'] = isset($request->location_title) ? $request->location_title : NULL;
        $data['common_single_banner_image'] = isset($request->common_single_banner_image) ? $request->common_single_banner_image : NULL;
        $data['team_subtitle'] = isset($request->team_subtitle) ? $request->team_subtitle : NULL;
        $data['team_title'] = isset($request->team_title) ? $request->team_title : NULL;
        
        return $data;
    }
}
