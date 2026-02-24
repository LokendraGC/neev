<?php

namespace App\Repositories;


class StoryRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {
        $data = [];

        $data['featured_image'] = isset($request->featured_image) ? $request->featured_image : NULL;
        $data['sector_categories'] = isset($request->sector_categories) ? serialize($request->sector_categories) : NULL;
        $data['head_office'] = isset($request->head_office) ? $request->head_office : NULL;
        $data['stay_updated_text'] = isset($request->stay_updated_text) ? $request->stay_updated_text : NULL;

        return $data;
    }
}
