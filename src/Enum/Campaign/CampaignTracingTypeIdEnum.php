<?php

namespace BusinessGazeta\AdfoxApi\Enum\Campaign;

enum CampaignTracingTypeIdEnum: int
{
//Учет действий.
//
//Допустимые значения:
//
//0 — не вести учет действий пользователя на сайте рекламодателя;
//1 — postClick — считать количество загрузок точек учета действия в течение суток с момента перехода по рекламному объявлению;
//2 — postClick и postView — считать количество загрузок точек учета действия как после переход, так и после просмотра рекламного объявления;
//3 — postView — считать количество загрузок точек учета действия после просмотра рекламного объявления или после суток с момента перехода по рекламному объявлению.
//Значение по умолчанию: 0.

    case DONT_KEEP_RECORDS = 0;
    case POST_CLICK = 1;
    case POST_CLICK_AND_POST_VIEW = 2;
    case POST_VIEW = 3;

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
