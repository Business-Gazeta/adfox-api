<?php

namespace BusinessGazeta\AdfoxApi\Enum\Campaign;

enum CampaignIsSimplifiedBannersEnum: int
{
//Упрощенные баннеры (дополнительный модуль).
//
//Допустимые значения:
//
//0 — выключено;
//1 — включено.
//Значение по умолчанию: 0.
    case ON = 1;
    case OFF = 0;
    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
