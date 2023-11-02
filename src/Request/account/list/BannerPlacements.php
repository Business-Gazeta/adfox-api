<?php

namespace BusinessGazeta\AdfoxApi\Request\account\list;

use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class
BannerPlacements extends AbstractAdfoxRequest
{
    private int $bannerID;

    public function __construct(int $bannerID)
    {
        $this->bannerID = $bannerID;
    }
    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['bannerID' => $this->bannerID]);

        return [
            'query' => $params
        ];
    }

    /**
     * @return int
     */
    public function getBannerID(): int
    {
        return $this->bannerID;
    }

    /**
     * @param int $bannerID
     */
    public function setBannerID(int $bannerID): void
    {
        $this->bannerID = $bannerID;
    }

}
