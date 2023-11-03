<?php

namespace BusinessGazeta\AdfoxApi\Enum\Place;

enum PlacePlpEnum: int
{
//    Ограничение по частоте показов на уровне площадки. Период частоты показов.
//    Допустимые значения:
//
//    -1 — из URL запроса (по умолчанию) — настройки ограничения показов будут использоваться из параметров URL запроса за баннером. Если в запросе значения не были переданы, то считается, что площадка без ограничений. Параметрыpli (количество показов за период) и pop (другой период) должны быть пустыми или отсутствовать в запросе;
//    0 — без ограничений — показы баннеров на данной площадке не ограничиваются, даже если в параметрах запроса указано иное. Параметры pli (количество показов за период) и pop (другой период) должны быть пустыми или отсутствовать в запросе;
//    1 — один час — ограничение действует один час с момента первого показа баннера уникальному пользователю;
//    2 — шесть часов — ограничение действует шесть часов с момента первого показа баннера уникальному пользователю;
//    3 — 12 часов — ограничение действует 12 часов с момента первого показа баннера уникальному пользователю.
//    4 — 24 часа — ограничение действует 24 часа с момента первого показа баннера уникальному пользователю.
//    5 — другой — собственный период действия ограничения показов в минутах. Параметр pop (другой период) является обязательным.
    case FROM_URL = -1;
    case WITHOUT_LIMITS = 0;
    case ONE_HOUR = 1;
    case SIX_HOURS = 2;
    case TWELVE_HOURS = 3;
    case TWENTY_FOUR_HOURS = 4;
    case OTHER = 5;
}
