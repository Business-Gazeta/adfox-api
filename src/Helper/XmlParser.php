<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Helper;

class XmlParser
{
    public static function parse(string $xml)
    {
        $xml = simplexml_load_string($xml);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        return json_encode($array);
    }
}
