<?php

namespace BusinessGazeta\AdfoxApi\Request\account\delete;

use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class Banner extends AbstractAdfoxRequest
{
    private int $campaignID;
    private string $listIDs;

    public function __construct(int $campaignID, string $listIDs)
    {
        $this->campaignID = $campaignID;
        $this->listIDs = $listIDs;

    }

    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['campaignID' => $this->campaignID]);
        $params = array_merge($params, ['listIDs' => $this->listIDs]);

        return [
            'query' => $params
        ];
    }

    /**
     * @return int
     */
    public function getCampaignID(): int
    {
        return $this->campaignID;
    }

    /**
     * @param int $campaignID
     */
    public function setCampaignID(int $campaignID): void
    {
        $this->campaignID = $campaignID;
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
