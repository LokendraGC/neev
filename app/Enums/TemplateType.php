<?php

namespace App\Enums;

class TemplateType
{
    const DEFAULT = 'default';

    const HOME = 'home';

    const ABOUT = 'about';

    const SERVICES = 'services';

    const MEDIA = 'media';

    const BUSINESS = 'business';

    const STORIES = 'stories';

    const COMPANIES = 'companies';

    const DOWNLOAD = 'download';

    const INVESTORS = 'investors';

    const SUSTAINABILITY = 'sustainability';

    const NEWS = 'news';

    const CONTACT = 'contact';

    const POLICY = 'policy';

    const TERMS = 'terms';

    const THANK_YOU = 'thank-you';

    const SEARCH = 'search';

    const VISION = 'vision';

    const LEADERSHIP = 'leadership';

    const OUR_LOCATION = 'our-location';

    const PRESS_RELEASE = 'press-release';

    const EVENTS = 'events';

    const OUR_STORY = 'our_story';

    public static function toArray()
    {
        return [
            self::DEFAULT,
            self::HOME,
            self::ABOUT,
            self::SERVICES,
            self::MEDIA,
            self::BUSINESS,
            self::DOWNLOAD,
            self::INVESTORS,
            self::SUSTAINABILITY,
            self::NEWS,
            self::CONTACT,
            self::STORIES,
            self::COMPANIES,
            self::POLICY,
            self::TERMS,
            self::THANK_YOU,
            self::SEARCH,
            self::VISION,
            self::LEADERSHIP,
            self::OUR_LOCATION,
            self::PRESS_RELEASE,
            self::EVENTS,
            self::OUR_STORY,
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
        $keyValuePairs['Business'] = self::BUSINESS;
        $keyValuePairs['Download'] = self::DOWNLOAD;
        $keyValuePairs['Investors'] = self::INVESTORS;
        $keyValuePairs['Sustainability'] = self::SUSTAINABILITY;
        $keyValuePairs['News'] = self::NEWS;
        $keyValuePairs['Contact'] = self::CONTACT;
        $keyValuePairs['Stories'] = self::STORIES;
        $keyValuePairs['Companies'] = self::COMPANIES;
        $keyValuePairs['Policy'] = self::POLICY;
        $keyValuePairs['Terms'] = self::TERMS;
        $keyValuePairs['Thank You'] = self::THANK_YOU;
        $keyValuePairs['Search'] = self::SEARCH;
        $keyValuePairs['Vision'] = self::VISION;
        $keyValuePairs['Leadership'] = self::LEADERSHIP;
        $keyValuePairs['Our Location'] = self::OUR_LOCATION;
        $keyValuePairs['Press Release'] = self::PRESS_RELEASE;
        $keyValuePairs['Events'] = self::EVENTS;
        $keyValuePairs['Our Story'] = self::OUR_STORY;


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
