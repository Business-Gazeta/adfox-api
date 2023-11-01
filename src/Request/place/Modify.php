<?php

namespace BusinessGazeta\AdfoxApi\Request\place;

use BusinessGazeta\AdfoxApi\Helper\DateInterface;
use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;
use BusinessGazeta\AdfoxApi\Request\banner\modify\Objects\BannerMediaData;
use BusinessGazeta\AdfoxApi\Types\BannerSendToErirTypes;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */

class Modify extends BasePlace
{
    private int $objectID;

    public function __construct(int $objectID)
    {
        $this->objectID = $objectID;

    }
    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['objectID' => $this->objectID]);

        return [
            'query' => $params
        ];
    }

    /**
     * @return int
     */
    public function getObjectID(): int
    {
        return $this->objectID;
    }

    /**
     * @param int $objectID
     */
    public function setObjectID(int $objectID): void
    {
        $this->objectID = $objectID;
    }

}
