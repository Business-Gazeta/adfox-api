<?php

namespace BusinessGazeta\AdfoxApi\Enum;

enum ObjectEnum: string
{
    case ACCOUNT = 'account';

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
