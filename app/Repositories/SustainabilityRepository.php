<?php

namespace App\Repositories;

use App\Models\Category;

class SustainabilityRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {

        $data = [];
        $data['sustainability_details'] = isset($request->sustainability_details) ? serialize($request->sustainability_details) : NULL;
        
        
        return $data;
    }
}
