<?php

namespace BusinessGazeta\AdfoxApi\Request\account\list;

use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class Advertiser extends AbstractAdfoxRequest
{
    private ?int $actionObjectID = null;

    public function params(): array
    {
        $params = parent::params();
        $params = $this->mergeParams($params, $this->actionObjectID, 'actionObjectID');
        $params['navigationClientID'] = 3715477;

        return [
            'query' => $params
        ];
    }

    /**
     * @return int
     */
    public function getActionObjectID(): int
    {
        return $this->actionObjectID;
    }

    /**
     * @param int $actionObjectID
     */
    public function setActionObjectID(int $actionObjectID): void
    {
        $this->actionObjectID = $actionObjectID;
    }

}
