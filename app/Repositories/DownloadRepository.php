<?php

namespace App\Repositories;

use App\Models\Category;

class DownloadRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {

        $data = [];
        $data['resources_details'] = isset($request->resources_details) ? serialize($request->resources_details) : NULL;
        $data['download_banner_image'] = isset($request->download_banner_image) ? $request->download_banner_image : NULL;
        
        return $data;
    }
}
