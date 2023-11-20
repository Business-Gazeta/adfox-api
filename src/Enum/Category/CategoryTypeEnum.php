<?php

namespace BusinessGazeta\AdfoxApi\Enum\Category;

enum CategoryTypeEnum: int
{
//    Тип категории.
//
//    Допустимые значения:
//
//    0 — постоянная категория. Используется для разметки сайтов, разделов и площадок.
//    1 — временная категория. Используется для настройки поведенческого таргетирования.
//    Значение по умолчанию: 0.
    case PERMANENT = 0;
    case TEMPORAL = 1;

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
