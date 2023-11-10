<?php

namespace BusinessGazeta\AdfoxApi\Enum\Website;

enum WebsiteSendToErirEnum: int
{
//    Передавать данные в ЕРИР.
//
//    Допустимые значения:
//
//    0 — не передавать данные в ЕРИР;
//    1 — передавать данные в ЕРИР (маркировка включена).
    case SEND_TO_ERIR = 1;
    case NOT_SEND_TO_ERIR = 0;
}
