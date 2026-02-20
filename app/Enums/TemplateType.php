<?php

namespace App\Enums;

class TemplateType
{
    const DEFAULT = 'default';
    const HOME = 'home';
    const ABOUT = 'about';

    const SERVICES = 'services';

    const MEDIA = 'media';

    const DOWNLOAD = 'download';

    const INVESTORS = 'investors';

    const SUSTAINABILITY = 'sustainability';

    const NEWS = 'news';

    const CONTACT = 'contact';

    public static function toArray()
    {
        return [
            self::DEFAULT,
            self::HOME,
            self::ABOUT,
            self::SERVICES,
            self::MEDIA,
            self::DOWNLOAD,
            self::INVESTORS,
            self::SUSTAINABILITY,
            self::NEWS,
            self::CONTACT,
        ];
    }

    // for separate displaying text and value
    public static function getKeyValuePairs()
    {
        $keyValuePairs = [];

        $keyValuePairs['Default'] = self::DEFAULT;
        $keyValuePairs['Home'] = self::HOME;
        $keyValuePairs['About'] = self::ABOUT;
        $keyValuePairs['Services'] = self::SERVICES;
        $keyValuePairs['Media'] = self::MEDIA;
        $keyValuePairs['Download'] = self::DOWNLOAD;
        $keyValuePairs['Investors'] = self::INVESTORS;
        $keyValuePairs['Sustainability'] = self::SUSTAINABILITY;
        $keyValuePairs['News'] = self::NEWS;
        $keyValuePairs['Contact'] = self::CONTACT;



        // Extract 'Default' and sort the remaining keys
        $defaultValue = ['Default' => $keyValuePairs['Default']];
        unset($keyValuePairs['Default']);

        ksort($keyValuePairs); // Sort remaining keys

        // Merge 'Default' at the beginning
        return $defaultValue + $keyValuePairs;
        
    }

    // if (!in_array($type, TemplateType::toArray())) {
    //     abort(404);
    // }
}
