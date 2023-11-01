<?php

namespace BusinessGazeta\AdfoxApi\Request\account\add;

use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class BannerType extends AbstractAdfoxRequest
{
    private string $name;
    private int $presentationTypeID;

    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['name' => $this->name]);
        $params = array_merge($params, ['presentationTypeID' => $this->presentationTypeID]);

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
    public function getPresentationTypeID(): int
    {
        return $this->presentationTypeID;
    }

    /**
     * @param int $presentationTypeID
     */
    public function setPresentationTypeID(int $presentationTypeID): void
    {
        $this->presentationTypeID = $presentationTypeID;
    }


}
