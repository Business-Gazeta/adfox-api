<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Types;

interface CategoryTypeTypes
{
//    Тип категории.
//
//    Допустимые значения:
//
//    0 — постоянная категория. Используется для разметки сайтов, разделов и площадок.
//    1 — временная категория. Используется для настройки поведенческого таргетирования.
//    Значение по умолчанию: 0.
    public const PERMANENT = 0;
    public const TEMPORAL = 1;
}
