<?php

namespace BusinessGazeta\AdfoxApi\Enum\Banner;

enum BannerAdLabelEnum: int
{

//    Показывать метку «Реклама» или «Соцреклама» на баннере.
//
//    Допустимые значения:
//
//    0 — метка отключена;
//    1 — показывать метку «Реклама»;
//    2 — показывать метку «Соцреклама».
    case LABEL_IS_DISABLED = 0;
    case SHOW_ADVERTISING_LABEL = 1;
    case SHOW_SOCIAL_ADVERTISING_LABEL = 2;

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
