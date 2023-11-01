<?php

namespace BusinessGazeta\AdfoxApi\Request\account\delete;

use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class Place extends AbstractAdfoxRequest
{
    private int $siteID;
    private string $listIDs;

    public function __construct(int $siteID, string $listIDs)
    {
        $this->siteID = $siteID;
        $this->listIDs = $listIDs;

    }

    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['siteID' => $this->siteID]);
        $params = array_merge($params, ['listIDs' => $this->listIDs]);

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
     * @return string
     */
    public function getListIDs(): string
    {
        return $this->listIDs;
    }

    /**
     * @param string $listIDs
     */
    public function setListIDs(string $listIDs): void
    {
        $this->listIDs = $listIDs;
    }

}
