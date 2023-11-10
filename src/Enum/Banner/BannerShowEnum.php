<?php

namespace BusinessGazeta\AdfoxApi\Enum\Banner;

enum BannerShowEnum: string
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
    case COMMON = 'common';
    case SHORT = 'short';
    case ADVANCED = 'advanced';
}
