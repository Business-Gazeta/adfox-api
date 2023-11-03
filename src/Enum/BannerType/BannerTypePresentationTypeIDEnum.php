<?php

namespace BusinessGazeta\AdfoxApi\Enum\BannerType;

enum BannerTypePresentationTypeIDEnum: int
{
//    Тип представления — определяет способ выгрузки кода баннера на сайт.
//
//    Допустимые значения:
//
//    4 — безразмерный. Код баннера будет выгружен как JavaScript-код.
//    5 — XML. Код баннера будет выгружен как XML-код.
    case DIMENSIONLESS = 4;
    case XML = 5;
}
