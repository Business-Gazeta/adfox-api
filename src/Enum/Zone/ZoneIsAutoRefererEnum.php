<?php

namespace BusinessGazeta\AdfoxApi\Enum\Zone;

enum ZoneIsAutoRefererEnum: int
{
//    Динамическое определение раздела сайта по referer.
//
//    Каждый запрос за баннером содержит информацию об адресе страницы (referer), откуда идет запрос.
//
//    Включение данной опции позволяет использовать код вставки, полученный с уровня сайта. При этом система, на основании поля referer запроса, будет автоматически определять, к какому разделу сайта относится запрос.
//
//    При выключении данной опции необходимо использовать коды вставки с уровня площадки.
//
//    Допустимые значения:
//
//    1 — включено;
//    0 — выключено;
//    Значение по умолчанию: 1.

    case DISABLED = 0;
    case ENABLED = 1;

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
