<?php

namespace BusinessGazeta\AdfoxApi\Enum\Campaign;

enum CampaignOuterMarkIdEnum: int
{
//Включить автоматическую подстановку меток к ссылкам для перехода.
//
//Допустимые значения:
//
//0 — выключено;
//1 — Openstat.ru;
//2 — Google Analytics.
//Значение по умолчанию: 0.
    case OFF = 0;
    case OPEN_STAT = 1;
    case GOOGLE_ANALYTICS = 2;
    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
