<?php

namespace BusinessGazeta\AdfoxApi\Enum\Campaign;

enum CampaignSendToErirEnum: int
{
//    Передавать данные в ЕРИР.
//
//    Допустимые значения:
//
//    0 — не передавать данные в ЕРИР;
//    1 — передавать данные в ЕРИР (маркировка включена).
//Значение по умолчанию: 0.
    case SEND_TO_ERIR = 1;
    case NOT_SEND_TO_ERIR = 0;

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
