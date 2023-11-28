<?php

namespace BusinessGazeta\AdfoxApi\Enum\Campaign;

enum CampaignPlacement2DataTypeEnum: string
{
//Тип данных.
//
//Допустимые значения:
//
//campaignSites – сайт;
//
//campaignSections – раздел;
//
//campaignPlaces – площадка;
//
//placesComputed — листинг сайтов, разделов и площадок.
    case SITE = 'campaignSites';
    case SECTION = 'campaignSections';
    case PLACES = 'campaignPlaces';
    case COMPUTED = 'placesComputed';
    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
