<?php

namespace BusinessGazeta\AdfoxApi\Enum\Campaign;

enum CampaignLogicTypeEnum: int
{
//Вид кампании. Для кампании внутри суперкампании — не требуется.
//
//Допустимые значения:
//
//0 — коммерческая;
//1 — промерочная.
//Значение по умолчанию: 0.

    case COMMERCIAL = 0;
    case NOT_COMMERCIAL = 1;

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
