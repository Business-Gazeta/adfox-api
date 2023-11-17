<?php

namespace BusinessGazeta\AdfoxApi\Enum\Banner;

enum BannerShowMenuEnum: int
{
//    Показывать меню на баннере.
//
//    Допустимые значения:
//
//    0 — не показывать меню;
//    1 — показывать меню.
    case NOT_SHOW = 0;
    case SHOW = 1;

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
