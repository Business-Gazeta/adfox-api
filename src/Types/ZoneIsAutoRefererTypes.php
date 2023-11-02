<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Types;

interface ZoneIsAutoRefererTypes
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

    public const DISABLED = 0;
    public const ENABLED = 1;
}