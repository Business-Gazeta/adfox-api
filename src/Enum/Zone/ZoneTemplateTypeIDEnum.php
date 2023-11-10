<?php

namespace BusinessGazeta\AdfoxApi\Enum\Zone;

enum ZoneTemplateTypeIDEnum: int
{
//    Тип шаблонов страниц. Подробнее о типах шаблонов читайте в статье Шаблоны referer.
//
//    Допустимые значения:
//
//    0 — стандартный;
//    1 — POSIX.2.
//    Значение по умолчанию: 0.

    case STANDARD = 0;
    case POSIX2 = 1;
}
