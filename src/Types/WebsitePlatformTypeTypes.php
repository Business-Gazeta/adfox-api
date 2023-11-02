<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Types;

interface WebsitePlatformTypeTypes
{
//    Тип площадки. Параметр для маркировки рекламы.
//
//    Допустимые значения:
//
//    0 — приложение;
//    1 — сайт;
//    2 — информационная система.
    public const APP = 0;
    public const SITE = 1;
    public const INF_SYSTEM = 2;
}
