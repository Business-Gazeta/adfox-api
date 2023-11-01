<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Types;

interface BannerTypePresentationTypeIDTypes
{
//    Тип представления — определяет способ выгрузки кода баннера на сайт.
//
//    Допустимые значения:
//
//    4 — безразмерный. Код баннера будет выгружен как JavaScript-код.
//    5 — XML. Код баннера будет выгружен как XML-код.
    public const DIMENSIONLESS = 4;
    public const XML = 5;
}
