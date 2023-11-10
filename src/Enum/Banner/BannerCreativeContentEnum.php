<?php

namespace BusinessGazeta\AdfoxApi\Enum\Banner;

enum BannerCreativeContentEnum: int
{
//    Тип креатива.
//
//    Допустимые значения:
//
//    0 — иное;
//    1 — баннер;
//    2 — текстово-графический блок;
//    3 — текстовый блок;
//    4 — видео;
//    5 — видеотрансляция в прямом эфире;
//    6 — аудиотрансляция в прямом эфире;
//    7 — аудиозапись.
    case OTHER = 0;
    case BANNER = 1;
    case TEXT_GRAPHIC_BLOCK = 2;
    case TEXT_BLOCK = 3;
    case VIDEO = 4;
    case VIDEO_BROADCAST = 5;
    case AUDIO_BROADCAST = 6;
    case AUDIO_RECORDING = 7;
}
