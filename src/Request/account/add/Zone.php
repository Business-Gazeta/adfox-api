<?php

namespace BusinessGazeta\AdfoxApi\Request\account\add;


use BusinessGazeta\AdfoxApi\Request\zone\BaseZone;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class Zone extends BaseZone
{
    private string $name;
    private int $siteID;

    public function __construct(string $name, int $siteID)
    {
        $this->name = $name;
        $this->siteID = $siteID;
    }
    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['name' => $this->name]);
        $params = array_merge($params, ['siteID' => $this->siteID]);

        return [
            'query' => $params
        ];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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

}
