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
        // add more meta data

        return $data;
    }
}
