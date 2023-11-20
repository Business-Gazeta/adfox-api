<?php

namespace BusinessGazeta\AdfoxApi\Enum\Banner;

enum BannerStatusEnum: int
{
//    Статус объекта. Могут быть показаны только объекты, находящиеся в статусе «активный».
//
//    Допустимые значения:
//
//    0 — активный — объект готов к началу открутки;
//    1 — приостановленный — предполагается, что объект временно отключен. По умолчанию фильтры в веб-интерфейсе Adfox показывают приостановленные объекты в списке;
//    2 — завершенный — предполагается, что объект завершил свою открутку. По умолчанию фильтры в веб-интерфейсе Adfox скрывают завершенные объекты.


    case ACTIVE = 0;
    case SUSPENDED = 1;
    case COMPLETED = 2;

    public static function list():array {
        $items = [];
        foreach (self::cases() as $case) {
            $items[$case->value] = $case->name;
        }
        return $items;
    }
}
