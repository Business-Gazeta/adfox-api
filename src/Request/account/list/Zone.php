<?php

namespace BusinessGazeta\AdfoxApi\Request\account\list;

use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class   Zone extends AbstractAdfoxRequest
{
    private ?int $actionObjectID = null;
    private ?int $actionObjectID2 = null;

    public function params(): array
    {
        $params = parent::params();
        $params = $this->mergeParams($params, $this->actionObjectID, 'actionObjectID');
        $params = $this->mergeParams($params, $this->actionObjectID2, 'actionObjectID2');

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
     * @return int|null
     */
    public function getActionObjectID2(): ?int
    {
        return $this->actionObjectID2;
    }

    /**
     * @param int|null $actionObjectID2
     */
    public function setActionObjectID2(?int $actionObjectID2): void
    {
        $this->actionObjectID2 = $actionObjectID2;
    }

}
