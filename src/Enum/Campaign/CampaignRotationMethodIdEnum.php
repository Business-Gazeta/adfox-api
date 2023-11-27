<?php

namespace BusinessGazeta\AdfoxApi\Enum\Campaign;

enum CampaignRotationMethodIdEnum: int
{
//Метод ротации кампании.
//
//Допустимые значения:
//
//0 — по приоритетности — использовать значения параметров level и priority для оценки вероятности показа рекламной кампании;
//1 — по % от трафика — использовать значение параметра trafficPercents для оценки вероятности показа рекламной кампании.
//Параметр trafficPercents обязателен.
//
//Значение по умолчанию: 0.
    case PRIORITY = 0;
    case TRAFFIC = 1;

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
