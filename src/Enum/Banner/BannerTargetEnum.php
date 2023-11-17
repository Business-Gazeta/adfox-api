<?php

namespace BusinessGazeta\AdfoxApi\Enum\Banner;

enum BannerTargetEnum: string
{
//    Значение параметра target для ссылки — определяет, в каком окне открыть ссылку.
//
//    Допустимые значения:
//
//    _blank — открыть страницу в новом окне браузера;
//    _parent — открыть страницу в текущем окне;
//    _top — открыть страницу в полном окне браузера.
    case BLANK = '_blank';
    case PARENT = '_parent';
    case TOP = '_top';

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
