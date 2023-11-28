<?php

namespace BusinessGazeta\AdfoxApi\Enum\Campaign;

enum CampaignActionStatusEnum: int
{
//Включить или выключить размещение.
//
//Допустимые значения:
//
//0 — выключить;
//1 — включить.
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
