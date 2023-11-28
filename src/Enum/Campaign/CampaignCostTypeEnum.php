<?php

namespace BusinessGazeta\AdfoxApi\Enum\Campaign;

enum CampaignCostTypeEnum: int
{
//Тип кампании.
//
//Допустимые значения:
//
//0 — другое;
//1 — CPM;
//2 — CPC;
//3 — CPA.
//Значение по умолчанию: 0.
    case OTHER = 0;
    case CPM = 1;
    case CPC = 2;
    case CPA = 3;
    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
