<?php

namespace BusinessGazeta\AdfoxApi\Request\account\delete;

use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class Template extends AbstractAdfoxRequest
{
    private string $listIDs;

    public function __construct(string $listIDs)
    {
        $this->listIDs = $listIDs;

    }

    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['listIDs' => $this->listIDs]);

        return [
            'query' => $params
        ];
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
