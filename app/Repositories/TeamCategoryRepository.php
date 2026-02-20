<?php

namespace App\Repositories;

use App\Traits\ImageFieldTrait;

class TeamCategoryRepository
{
    use ImageFieldTrait;

    public function processMetaData($payload, $request)
    {
        $metaDatas = [];
        $metaDatas['main_description'] = isset( $request->main_description ) ? $request->main_description : NULL;
        $metaDatas['seo_title'] = isset( $request->seo_title ) ? $request->seo_title : NULL;
        $metaDatas['seo_description'] = isset( $request->seo_description ) ? $request->seo_description : NULL;
       
        // add meta data as per form data

        return $metaDatas;
    }
}