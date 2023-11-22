<?php

namespace BusinessGazeta\AdfoxApi\Request\banner\modify;

use BusinessGazeta\AdfoxApi\Enum\BannerType\BannerTypeIsOnEnum;
use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;
use BusinessGazeta\AdfoxApi\Request\banner\modify\Objects\BannerPlacement;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class Placement extends AbstractAdfoxRequest
{
    private int $objectID;
    private string $type;
    private ?BannerPlacement $siteID = null;
    private ?BannerPlacement $sectionID = null;
    private ?BannerPlacement $placeID = null;

    public function __construct(int $objectID, string $type)
    {
        $this->objectID = $objectID;
        $this->type = $type;
    }

    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['objectID' => $this->objectID]);
        $params = array_merge($params, ['type' => $this->type]);
        $params = array_merge($params, $this->siteID?->getData('_site') ?? []);
        $params = array_merge($params, $this->sectionID?->getData('_section') ?? []);
        $params = array_merge($params, $this->placeID?->getData('_place') ?? []);

        return [
            'query' => $params
        ];
    }

    /**
     * @return int
     */
    public function getObjectID(): int
    {
        return $this->objectID;
    }

    /**
     * @param int $objectID
     */
    public function setObjectID(int $objectID): void
    {
        $this->objectID = $objectID;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }


    /**
     * @return BannerPlacement|null
     */
    public function getSiteID(): ?BannerPlacement
    {
        return $this->siteID;
    }

    /**
     * @param BannerPlacement|null $siteID
     */
    public function setSiteID(?BannerPlacement $siteID): void
    {
        $this->siteID = $siteID;
    }

    /**
     * @return BannerPlacement|null
     */
    public function getSectionID(): ?BannerPlacement
    {
        return $this->sectionID;
    }

    /**
     * @param BannerPlacement|null $sectionID
     */
    public function setSectionID(?BannerPlacement $sectionID): void
    {
        $this->sectionID = $sectionID;
    }

    /**
     * @return BannerPlacement|null
     */
    public function getPlaceID(): ?BannerPlacement
    {
        return $this->placeID;
    }

    /**
     * @param BannerPlacement|null $placeID
     */
    public function setPlaceID(?BannerPlacement $placeID): void
    {
        $this->placeID = $placeID;
    }

}
