<?php

namespace BusinessGazeta\AdfoxApi\Request\account\list;

use BusinessGazeta\AdfoxApi\Enum\Banner\BannerShowEnum;
use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class Banner extends AbstractAdfoxRequest
{
    private ?int $actionObjectID = null;
    private ?string $listCampaignIDs = null;
    private ?BannerShowEnum $show = null;
    private ?string $search = null;

    public function params(): array
    {
        $params = parent::params();
        $params = $this->mergeParams($params, $this->actionObjectID, 'actionObjectID');
        $params = $this->mergeParams($params, $this->listCampaignIDs, 'listCampaignIDs');
        $params = $this->mergeParams($params, $this->show?->value, 'show');
        $params = $this->mergeParams($params, $this->search, 'search');

        return [
            'query' => $params
        ];
    }

    /**
     * @return int|null
     */
    public function getActionObjectID(): ?int
    {
        return $this->actionObjectID;
    }

    /**
     * @param int|null $actionObjectID
     */
    public function setActionObjectID(?int $actionObjectID): void
    {
        $this->actionObjectID = $actionObjectID;
    }

    /**
     * @return string|null
     */
    public function getListCampaignIDs(): ?string
    {
        return $this->listCampaignIDs;
    }

    /**
     * @param string|null $listCampaignIDs
     */
    public function setListCampaignIDs(?string $listCampaignIDs): void
    {
        $this->listCampaignIDs = $listCampaignIDs;
    }

    /**
     * @return BannerShowEnum|null
     */
    public function getShow(): ?BannerShowEnum
    {
        return $this->show;
    }

    /**
     * @param BannerShowEnum|null $show
     */
    public function setShow(?BannerShowEnum $show): void
    {
        $this->show = $show;
    }

    /**
     * @return string|null
     */
    public function getSearch(): ?string
    {
        return $this->search;
    }

    /**
     * @param string|null $search
     */
    public function setSearch(?string $search): void
    {
        $this->search = $search;
    }

}
