<?php

namespace BusinessGazeta\AdfoxApi\Enum\Campaign;

enum CampaignShowEnum: string
{
//Параметр применяется для указания полноты данных в списке кампаний, а также для вывода настроек таргетирования конкретной кампании.
//
//Настройка полноты данных в списке кампаний:
//
//Допустимые значения:
//
//common — краткий вывод:
//ID;
//name.
//short — сокращенный вывод:
//ID;
//name;
//superCampaignID;
//status;
//dateStart;
//dateEnd;
//dateFinished.
//advanced — полный вывод.
//Значение по умолчанию: advanced.
//Настройка вывода таргетирования конкретной кампании:
//
//actionObjectID — обязательный параметр.
//
//dateAddedFrom, dateAddedTo и search — запрещены.
//
//Допустимые значения:
//
//targetingTime — таргетирование по времени;
//
//targetingFrequency — таргетирование по частоте;
//
//targetingBehavior — таргетирование по поведению;
//
//targetingGeobase — таргетирование по географии;
//targetingSearch — таргетирование по поисковым запросам;
//targetingGender — таргетирование по полу;
//targetingAge — таргетирование по возрасту;
//targetingRevenue — таргетирование по доходу;
//targetingUser — дополнительное таргетирование. Дополнительные параметры: criteriaID и showMode.
    case COMMON = 'common';
    case SHORT = 'short';
    case ADVANCED = 'advanced';
    case TARGETING_TIME = 'targetingTime';
    case TARGETING_FREQUENCY = 'targetingFrequency';
    case TARGETING_BEHAVIOR = 'targetingBehavior';
    case TARGETING_GEOBASE = 'targetingGeobase';
    case TARGETING_SEARCH = 'targetingSearch';
    case TARGETING_GENDER = 'targetingGender';
    case TARGETING_AGE = 'targetingAge';
    case TARGETING_REVENUE = 'targetingRevenue';
    case TARGETING_USER = 'targetingUser';

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
