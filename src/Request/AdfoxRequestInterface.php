<?php

namespace BusinessGazeta\AdfoxApi\Request;

use BusinessGazeta\AdfoxApi\Enum\HttpMethodEnum;

interface AdfoxRequestInterface
{
    public function getMethod(): HttpMethodEnum;
    public function params(): array;
}
