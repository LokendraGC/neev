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
        $data['location_imag_select'] = isset($request->location_imag_select) ? $request->location_imag_select : NULL;
        $data['location_subtitle'] = isset($request->location_subtitle) ? $request->location_subtitle : NULL;
        $data['location_title'] = isset($request->location_title) ? $request->location_title : NULL;
        $data['about_banner_image'] = isset($request->about_banner_image) ? $request->about_banner_image : NULL;

        
        return $data;
    }
}
