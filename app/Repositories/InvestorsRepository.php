<?php

namespace App\Repositories;


class InvestorsRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {
        $data = [];

        $data['investors_details'] = isset( $request->investors_details ) ? serialize($request->investors_details) : NULL;
        $data['common_single_banner_image'] = isset( $request->common_single_banner_image ) ? $request->common_single_banner_image : NULL;
        $data['investors_details_description'] = isset( $request->investors_details_description ) ? $request->investors_details_description : NULL;
        $data['partner_details'] = isset( $request->partner_details ) ? serialize($request->partner_details) : NULL;
       
       
        $data['investor_relations_featured_image'] = isset( $request->investor_relations_featured_image ) ? $request->investor_relations_featured_image : NULL;
        $data['investor_relations_title'] = isset( $request->investor_relations_title ) ? $request->investor_relations_title : NULL;
        $data['investor_relations_description'] = isset( $request->investor_relations_description ) ? $request->investor_relations_description : NULL;

        $data['subsidiaries_associates_featured_image'] = isset( $request->subsidiaries_associates_featured_image ) ? $request->subsidiaries_associates_featured_image : NULL;
        $data['subsidiaries_associates_title'] = isset( $request->subsidiaries_associates_title ) ? $request->subsidiaries_associates_title : NULL;
        $data['subsidiaries_associates_description'] = isset( $request->subsidiaries_associates_description ) ? $request->subsidiaries_associates_description : NULL;
    
        return $data;
    }
}
