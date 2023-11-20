<?php

namespace BusinessGazeta\AdfoxApi\Enum\Banner;

enum BannerIsUnplacedEnum: int
{
//    Отключить размещение баннера на площадках, созданных после добавления баннера.
//
//    Допустимые значения:
//
//    0 — выключено;
//    1 — включено.
    case DISABLED = 0;
    case ENABLED = 1;

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
