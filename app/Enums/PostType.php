<?php

namespace App\Enums;

class PostType
{
    const POST = 'post';
    const PAGE = 'page';
    const TEAM = 'team';

    const STORY = 'story';

    const COMPANY = 'company';

    public static function toArray()
    {
        return [
            self::POST,
            self::PAGE,
            self::TEAM,
            self::STORY,
            self::COMPANY,
        ];
    }
}
