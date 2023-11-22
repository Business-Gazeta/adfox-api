<?php

namespace BusinessGazeta\AdfoxApi\Enum\Banner;

enum BannerPlacementEnum: string
{

//ID в названии параметра замените на идентификатор сайта, например: _site676.
//
//Допустимые значения:
//
//on — включить размещение;
//off — выключить размещение.
    case ON = 'on';
    case OFF = 'off';
    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
