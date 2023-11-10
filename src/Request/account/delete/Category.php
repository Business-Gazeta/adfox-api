<?php

namespace BusinessGazeta\AdfoxApi\Request\account\delete;

use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class Category extends AbstractAdfoxRequest
{
    private int $actionObjectID;

    public function __construct(int $actionObjectID)
    {
        $this->actionObjectID = $actionObjectID;
    }
    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['actionObjectID' => $this->actionObjectID]);

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
