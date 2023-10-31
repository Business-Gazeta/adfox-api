<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Types;

interface BannerCreativeContentTypes
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
    public const OJTHER = 0;
    public const BANNER = 1;
    public const TEXT_GRAPHIC_BLOCK = 2;
    public const TEXT_BLOCK = 3;
    public const VIDEO = 4;
    public const VIDEO_BROADCAST = 5;
    public const AUDIO_BROADCAST = 6;
    public const AUDIO_RECORDING = 7;
}
