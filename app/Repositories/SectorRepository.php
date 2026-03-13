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
        $data['location_name'] = isset( $request->location_name ) ? $request->location_name : NULL;
        $data['sector_image'] = isset( $request->sector_image ) ? $request->sector_image : NULL;
        $data['location_image'] = isset( $request->location_image ) ? $request->location_image : NULL;
        $data['location_description'] = isset( $request->location_description ) ? $request->location_description : NULL;
        // add more meta data

        $data['sector_details'] = isset( $request->sector_details ) ? serialize($request->sector_details) : NULL;

        return $data;
    }
}
