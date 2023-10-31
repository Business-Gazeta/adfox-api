<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Types;

interface BannerAdLabelTypes
{

//    Показывать метку «Реклама» или «Соцреклама» на баннере.
//
//    Допустимые значения:
//
//    0 — метка отключена;
//    1 — показывать метку «Реклама»;
//    2 — показывать метку «Соцреклама».
    public const LABEL_IS_DISABLED = 0;
    public const SHOW_ADVERTISING_LABEL = 1;
    public const SHOW_SOCIAL_ADVERTISING_LABEL = 2;
}
