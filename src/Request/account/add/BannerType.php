<?php

namespace BusinessGazeta\AdfoxApi\Request\account\add;

use BusinessGazeta\AdfoxApi\Enum\BannerType\BannerTypePresentationTypeIDEnum;
use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class BannerType extends AbstractAdfoxRequest
{
    private string $name;
    private BannerTypePresentationTypeIDEnum $presentationTypeID;

    public function __construct(string $name, BannerTypePresentationTypeIDEnum $presentationTypeID)
    {
        $this->name = $name;
        $this->presentationTypeID = $presentationTypeID;
    }

    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['name' => $this->name]);
        $params = array_merge($params, ['presentationTypeID' => $this->presentationTypeID->value]);

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
     * @return BannerTypePresentationTypeIDEnum
     */
    public function getPresentationTypeID(): BannerTypePresentationTypeIDEnum
    {
        return $this->presentationTypeID;
    }

    /**
     * @param BannerTypePresentationTypeIDEnum $presentationTypeID
     */
    public function setPresentationTypeID(BannerTypePresentationTypeIDEnum $presentationTypeID): void
    {
        $this->presentationTypeID = $presentationTypeID;
    }

}
