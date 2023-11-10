<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Types;

interface BannerSendToErirTypes
{

//    Передавать данные в ЕРИР.
//
//    Допустимые значения:
//
//    0 — не передавать данные в ЕРИР;
//    1 — передавать данные в ЕРИР (маркировка включена).
    public const SEND_TO_ERIR = 1;
    public const NOT_SEND_TO_ERIR = 0;
}
