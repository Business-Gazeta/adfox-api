<?php

namespace BusinessGazeta\AdfoxApi\Enum\Campaign;

enum CampaignShowModeEnum: string
{
//Используется только для получения данных по пользовательскому таргетированию (show=targetingUser).
//
//Позволяет выводить список разрешенных и/или запрещенных значений указанной пользовательской характеристики в рекламной кампании.
//
//Допустимые значения:
//
//denied — показать только запрещенные значения;
//
//allowed — показать только разрешенные значения;
//
//all — показать все значения с разбивкой на разрешенные и запрещенные.
//
//Значение по умолчанию: denied.
    case COMMON = 'denied';
    case ALLOWED = 'allowed';
    case ALL = 'all';

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
