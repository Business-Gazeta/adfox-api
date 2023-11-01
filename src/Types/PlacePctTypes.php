<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Types;

interface PlacePctTypes
{
//    Настройка, разрешающая показы определенных типов рекламных кампаний на данной площадке.
//
//    Допустимые значения:
//
//    0 — из URL запроса (по умолчанию) — тип кода определяется значением параметра, полученного из URL запроса за баннером. Если в запросе значение не было передано, по умолчанию площадка считается с типом кода обычный;
//    1 — обычный — разрешены к показу баннеры из всех рекламных кампаний, кроме кампаний с типом сессионные на странице.
//    2 — неповторяющиеся — на странице сайта устанавливается несколько кодов вставки для данной площадки, по запросам которых будет подобрано для показа несколько разных баннеров, кроме кампаний с типом сессионные на странице;
//    3 — сессионный на странице — разрешены к показу баннеры из рекламных кампаний, отмеченных как сессионные на странице (имеют приоритет перед обычными кампаниями), если сессионных кампаний для показа нет, будет выбрана для показа обычная рекламная кампания;
//    4 — неповторяющиеся кампании — на странице сайта устанавливается несколько кодов вставки для данной площадки, по запросам которых будет подобрано по одному баннеру из одной рекламной кампании, кроме кампаний с типом сессионные на странице.
    public const FROM_URL = 0;
    public const COMMON = 1;
    public const NON_REPETITIVE = 2;
    public const SEESION = 3;
    public const UNIQUE_COMPANY = 4;
}