<?php

namespace BusinessGazeta\AdfoxApi\Request\campaign;

use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignIsTrafficSmoothEnum;
use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignOuterMarkIdEnum;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/campaign/campaign-modify.html
 */

class Modify extends BaseCampaign
{
    private int $objectID;
    private ?string $name = null;
    private ?int $advertiserID = null;
    private ?CampaignIsTrafficSmoothEnum $isTrafficSmooth = null;
    #[Assert\Expression(
        "this !== NULL or this.getKindIdValue() !== 2",
        message: 'Пороговое значение CPM (обязательный параметр) для рекламной кампании вида Динамическая монетизация.',
    )]
    #[Assert\GreaterThan(value: 0)]
    private ?int $cpc = null;

    public function __construct(int $objectID)
    {
        $this->objectID = $objectID;
    }

    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['objectID' => $this->objectID]);
        $params = $this->mergeParams($params, $this->name, 'name');
        $params = $this->mergeParams($params, $this->advertiserID, 'advertiserID');
        $params = $this->mergeParams($params, $this->isTrafficSmooth->value, 'isTrafficSmooth');
        $params = $this->mergeParams($params, $this->cpc, 'cpc');

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
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int|null
     */
    public function getAdvertiserID(): ?int
    {
        return $this->advertiserID;
    }

    /**
     * @param int|null $advertiserID
     */
    public function setAdvertiserID(?int $advertiserID): void
    {
        $this->advertiserID = $advertiserID;
    }

    /**
     * @return CampaignIsTrafficSmoothEnum|null
     */
    public function getIsTrafficSmooth(): ?CampaignIsTrafficSmoothEnum
    {
        return $this->isTrafficSmooth;
    }

    /**
     * @param CampaignIsTrafficSmoothEnum|null $isTrafficSmooth
     */
    public function setIsTrafficSmooth(?CampaignIsTrafficSmoothEnum $isTrafficSmooth): void
    {
        $this->isTrafficSmooth = $isTrafficSmooth;
    }

    /**
     * @return int|null
     */
    public function getCpc(): ?int
    {
        return $this->cpc;
    }

    /**
     * @param int|null $cpc
     */
    public function setCpc(?int $cpc): void
    {
        $this->cpc = $cpc;
    }

}
