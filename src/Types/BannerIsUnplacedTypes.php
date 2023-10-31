<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Types;

interface BannerIsUnplacedTypes
{

//    Отключить размещение баннера на площадках, созданных после добавления баннера.
//
//    Допустимые значения:
//
//    0 — выключено;
//    1 — включено.
    public const DISABLED = 0;
    public const ENABLED = 1;
}
