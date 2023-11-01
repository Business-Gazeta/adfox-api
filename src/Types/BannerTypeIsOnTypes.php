<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Types;

interface BannerTypeIsOnTypes
{
//    Включить/выключить объект.
//
//    Допустимые значения:
//
//    0 — выключен, не доступен для создания баннеров;
//    1 — включен.
    public const ENABLED = 1;
    public const DISABLED = 0;
}
