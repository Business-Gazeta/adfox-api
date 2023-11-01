<?php

namespace BusinessGazeta\AdfoxApi\Request\account\add;

use BusinessGazeta\AdfoxApi\Helper\DateInterface;
use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;
use BusinessGazeta\AdfoxApi\Request\banner\modify\Objects\BannerMediaData;
use BusinessGazeta\AdfoxApi\Request\place\BasePlace;
use BusinessGazeta\AdfoxApi\Types\BannerSendToErirTypes;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */

class Place extends BasePlace
{
    private string $name;
    private int $siteID;
    private int $zoneID;
    private int $bannerTypeID;
    private int $positionID;

    public function __construct(string $name, int $siteID, int $zoneID, int $bannerTypeID, int $positionID)
    {
        $this->name = $name;
        $this->siteID = $siteID;
        $this->zoneID = $zoneID;
        $this->bannerTypeID = $bannerTypeID;
        $this->positionID = $positionID;
    }
    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['name' => $this->name]);
        $params = array_merge($params, ['siteID' => $this->siteID]);
        $params = array_merge($params, ['zoneID' => $this->zoneID]);
        $params = array_merge($params, ['bannerTypeID' => $this->bannerTypeID]);
        $params = array_merge($params, ['positionID' => $this->positionID]);

        return [
            'query' => $params
        ];
    }

    /**
     * @return int
     */
    public function getSiteID(): int
    {
        return $this->siteID;
    }

    /**
     * @param int $siteID
     */
    public function setSiteID(int $siteID): void
    {
        $this->siteID = $siteID;
    }

    /**
     * @return int
     */
    public function getZoneID(): int
    {
        return $this->zoneID;
    }

    /**
     * @param int $zoneID
     */
    public function setZoneID(int $zoneID): void
    {
        $this->zoneID = $zoneID;
    }

    /**
     * @return int
     */
    public function getBannerTypeID(): int
    {
        return $this->bannerTypeID;
    }

    /**
     * @param int $bannerTypeID
     */
    public function setBannerTypeID(int $bannerTypeID): void
    {
        $this->bannerTypeID = $bannerTypeID;
    }

}
