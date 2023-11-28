<?php

namespace BusinessGazeta\AdfoxApi\Enum\Campaign;

enum CampaignIsOnEnum: string
{
//Выводить данные о включенных/выключенных размещениях.
//
//Допустимые значения:
//
//on — выводить данные только о включенном размещении;
//off — выводить данные о включенном и выключенном размещении.
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
