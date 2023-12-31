<?php

namespace BusinessGazeta\AdfoxApi\Enum\Website;

enum WebsitePlatformTypeEnum: int
{
//    Тип площадки. Параметр для маркировки рекламы.
//
//    Допустимые значения:
//
//    0 — приложение;
//    1 — сайт;
//    2 — информационная система.
    case APP = 0;
    case SITE = 1;
    case INF_SYSTEM = 2;

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
