<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Types;

interface BannerShowTypes
{

//    Настройка полноты данных в списке кампаний/флайтов:
//    Допустимые значения:
//
//    common — краткий вывод:
//    ID;
//    name.
//
//    short — сокращенный вывод:
//    ID;
//    bannerTypeID;
//    templateID;
//    campaignID;
//    status;
//    dateStart;
//    dateEnd.
//
//    advanced — полный вывод.
//    Значение по умолчанию: advanced.
    public const COMMON = 'common';
    public const SHORT = 'short';
    public const ADVANCED = 'advanced';
}
