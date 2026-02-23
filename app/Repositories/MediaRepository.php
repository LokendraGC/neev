<?php

namespace App\Repositories;

use App\Models\Category;

class MediaRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {
        $data = [];

        $data['featured_image'] = isset( $request->featured_image ) ? $request->featured_image : NULL;
        $data['sector_categories'] = isset( $request->sector_categories ) ? serialize($request->sector_categories) : NULL;
        $data['source'] = isset( $request->source ) ? $request->source : NULL;
        $data['source_url'] = isset( $request->source_url ) ? $request->source_url : NULL;
        $data['choose_company'] = isset( $request->choose_company ) ? $request->choose_company : NULL;

        return $data;
    }
}
