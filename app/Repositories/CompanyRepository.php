<?php

namespace App\Repositories;


class CompanyRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {
        $data = [];

        $data['featured_image'] = isset( $request->featured_image ) ? $request->featured_image : NULL;
        $data['sector_categories'] = isset( $request->sector_categories ) ? serialize($request->sector_categories) : NULL;
        $data['head_office'] = isset( $request->head_office ) ? $request->head_office : NULL;
        $data['stay_updated_text'] = isset( $request->stay_updated_text ) ? $request->stay_updated_text : NULL;
        $data['website_url'] = isset( $request->website_url ) ? $request->website_url : NULL;
        $data['social_media_company'] = isset( $request->social_media_company ) ? serialize($request->social_media_company) : NULL;

        return $data;
    }
}
