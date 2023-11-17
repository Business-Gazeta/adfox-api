<?php

namespace BusinessGazeta\AdfoxApi\Enum;

enum HttpMethodEnum: string
{
    case GET = 'get';
    case POST = 'post';

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
