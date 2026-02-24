<?php

namespace App\Repositories;

use App\Models\Category;

class ContactRepository
{
    // insert or update meta data
    public function processMetaData($payload, $request)
    {

        $data = [];
        $data['contact_details'] = isset($request->contact_details) ? serialize($request->contact_details) : NULL;
        
        
        return $data;
    }
}
