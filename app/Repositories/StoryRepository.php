<?php

namespace App\Repositories;


class StoryRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {
        $data = [];

        $data['featured_image'] = isset( $request->featured_image ) ? $request->featured_image : NULL;
        $data['sector_categories'] = isset( $request->sector_categories ) ? serialize($request->sector_categories) : NULL;
        // add more meta data

        return $data;
    }
}
