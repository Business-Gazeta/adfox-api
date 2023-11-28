<?php

namespace BusinessGazeta\AdfoxApi\Request\campaign\info;

use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignIsOnEnum;
use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignPlacement2DataTypeEnum;
use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/campaign/campaign-info-placement2.html
 */


class Placement2 extends AbstractAdfoxRequest
{
    private int $objectID;
    private CampaignPlacement2DataTypeEnum $dataType;
    private CampaignIsOnEnum $isOn;
    #[Assert\Expression(
        "this !== NULL or !this.isSite()",
        message: 'Параметр обязателен для типа данных - раздел (campaignSections)',
    )]
    private ?int $websiteID = null;
    #[Assert\Expression(
        "this !== NULL or !this.isSection()",
        message: 'Параметр обязателен для типа данных - площадка (campaignPlaces)',
    )]
    private ?int $sectionID = null;

    public function __construct(int $objectID, CampaignPlacement2DataTypeEnum $dataType, CampaignIsOnEnum $isOn)
    {
        $this->objectID = $objectID;
        $this->dataType = $dataType;
        $this->isOn = $isOn;
    }

    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['objectID' => $this->objectID]);
        $params = array_merge($params, ['dataType' => $this->dataType->value]);
        $params = array_merge($params, ['isOn' => $this->isOn->value]);
        $params = $this->mergeParams($params, $this->websiteID, 'websiteID');
        $params = $this->mergeParams($params, $this->sectionID, 'websiteID');

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
     * @return CampaignPlacement2DataTypeEnum
     */
    public function getDataType(): CampaignPlacement2DataTypeEnum
    {
        return $this->dataType;
    }

    /**
     * @param CampaignPlacement2DataTypeEnum $dataType
     */
    public function setDataType(CampaignPlacement2DataTypeEnum $dataType): void
    {
        $this->dataType = $dataType;
    }

    /**
     * @return CampaignIsOnEnum
     */
    public function getIsOn(): CampaignIsOnEnum
    {
        return $this->isOn;
    }

    /**
     * @param CampaignIsOnEnum $isOn
     */
    public function setIsOn(CampaignIsOnEnum $isOn): void
    {
        $this->isOn = $isOn;
    }

    /**
     * @return int|null
     */
    public function getWebsiteID(): ?int
    {
        return $this->websiteID;
    }

    /**
     * @param int|null $websiteID
     */
    public function setWebsiteID(?int $websiteID): void
    {
        $this->websiteID = $websiteID;
    }

    /**
     * @return int|null
     */
    public function getSectionID(): ?int
    {
        return $this->sectionID;
    }

    /**
     * @param int|null $sectionID
     */
    public function setSectionID(?int $sectionID): void
    {
        $this->sectionID = $sectionID;
    }

    public function isSite(): bool
    {
        return $this->dataType->value === CampaignPlacement2DataTypeEnum::SECTION;
    }

    public function isSection (): bool
    {
        return $this->dataType->value === CampaignPlacement2DataTypeEnum::SECTION;
    }

}
