<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Types;

interface BannerTargetTypes
{

//    Значение параметра target для ссылки — определяет, в каком окне открыть ссылку.
//
//    Допустимые значения:
//
//    _blank — открыть страницу в новом окне браузера;
//    _parent — открыть страницу в текущем окне;
//    _top — открыть страницу в полном окне браузера.
    public const BLANK = '_blank';
    public const PARENT = '_parent';
    public const TOP = '_top';
}
