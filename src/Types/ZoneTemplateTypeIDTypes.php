<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Types;

interface ZoneTemplateTypeIDTypes
{

//    Тип шаблонов страниц. Подробнее о типах шаблонов читайте в статье Шаблоны referer.
//
//    Допустимые значения:
//
//    0 — стандартный;
//    1 — POSIX.2.
//    Значение по умолчанию: 0.

    public const STANDARD = 0;
    public const POSIX2 = 1;
}
