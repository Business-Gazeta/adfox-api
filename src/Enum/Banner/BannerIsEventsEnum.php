<?php

namespace BusinessGazeta\AdfoxApi\Enum\Banner;

enum BannerIsEventsEnum: int
{
//    Получить ссылки на события.
//
//    Допустимые значения:
//
//    0 — выключено;
//    1 — включено.
    case DISABLED = 0;
    case ENABLED = 1;
}
