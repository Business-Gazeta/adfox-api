<?php

namespace BusinessGazeta\AdfoxApi\Enum\BannerType;

enum BannerTypeIsOnEnum: int
{
//    Включить/выключить объект.
//
//    Допустимые значения:
//
//    0 — выключен, не доступен для создания баннеров;
//    1 — включен.
    case ENABLED = 1;
    case DISABLED = 0;

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
