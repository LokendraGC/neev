<?php

namespace App\Repositories;

use App\Models\Category;

class SectorRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {
        $data = [];

        $data['featured_image'] = isset( $request->featured_image ) ? $request->featured_image : NULL;
        $data['sectors'] = isset( $request->sectors ) ? serialize($request->sectors) : NULL;
        $data['main_description'] = isset( $request->main_description ) ? $request->main_description : NULL;
        $data['sector_description'] = isset( $request->sector_description ) ? $request->sector_description : NULL;
        $data['seo_title'] = isset( $request->seo_title ) ? $request->seo_title : NULL;
        $data['seo_description'] = isset( $request->seo_description ) ? $request->seo_description : NULL;
        // add more meta data

        return $data;
    }
}
