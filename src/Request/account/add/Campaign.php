<?php

namespace BusinessGazeta\AdfoxApi\Request\account\add;

use BusinessGazeta\AdfoxApi\Request\campaign\BaseCampaign;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-add-campaign.html
 */

class Campaign extends BaseCampaign
{
    private string $name;
    private int $advertiserID;
    private ?int $superCampaignID = null;
    #[Assert\Expression(
        "value === 0 or value === 2101 or value === 2102 or value === 1101 or (value > 100 and value < 131)",
        message: 'Допустимые значения: 0, 1101, 2101, 2102, 100-130',
    )]
    private ?int $impressionsMethodID = null;
    #[Assert\Expression(
        "this.getCommonProfileID === NULL or (this.getBundleID() === NULL and this.getTargetingProfileID === NULL)",
        message: 'При указании общего профиля не нужно передавать профиль таргетирования и профиль размещения.',
    )]
    private ?int $commonProfileID = null;
    private ?int $bundleID = null;
    #[Assert\Range(
        notInRangeMessage: 'Допустимые значения: от 1 до 2147483647.',
        min: 1,
        max: 2147483647
    )]
    private ?int $maxImpressionsPerHour = null;

    public function __construct(string $name, int $advertiserID)
    {
        $this->name = $name;
        $this->advertiserID = $advertiserID;
    }
    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['name' => $this->name]);
        $params = array_merge($params, ['advertiserID' => $this->advertiserID]);
        $params = $this->mergeParams($params, $this->superCampaignID, 'superCampaignID');
        $params = $this->mergeParams($params, $this->impressionsMethodID, 'impressionsMethodID');
        $params = $this->mergeParams($params, $this->commonProfileID, 'commonProfileID');
        $params = $this->mergeParams($params, $this->bundleID, 'bundleID');
        $params = $this->mergeParams($params, $this->maxImpressionsPerHour, 'maxImpressionsPerHour');

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
    public function getAdvertiserID(): int
    {
        return $this->advertiserID;
    }

    /**
     * @param int $advertiserID
     */
    public function setAdvertiserID(int $advertiserID): void
    {
        $this->advertiserID = $advertiserID;
    }

    /**
     * @return int|null
     */
    public function getSuperCampaignID(): ?int
    {
        return $this->superCampaignID;
    }

    /**
     * @param int|null $superCampaignID
     */
    public function setSuperCampaignID(?int $superCampaignID): void
    {
        $this->superCampaignID = $superCampaignID;
    }

    /**
     * @return int|null
     */
    public function getImpressionsMethodID(): ?int
    {
        return $this->impressionsMethodID;
    }

    /**
     * @param int|null $impressionsMethodID
     */
    public function setImpressionsMethodID(?int $impressionsMethodID): void
    {
        $this->impressionsMethodID = $impressionsMethodID;
    }

    /**
     * @return int|null
     */
    public function getCommonProfileID(): ?int
    {
        return $this->commonProfileID;
    }

    /**
     * @param int|null $commonProfileID
     */
    public function setCommonProfileID(?int $commonProfileID): void
    {
        $this->commonProfileID = $commonProfileID;
    }

    /**
     * @return int|null
     */
    public function getBundleID(): ?int
    {
        return $this->bundleID;
    }

    /**
     * @param int|null $bundleID
     */
    public function setBundleID(?int $bundleID): void
    {
        $this->bundleID = $bundleID;
    }

    /**
     * @return int|null
     */
    public function getMaxImpressionsPerHour(): ?int
    {
        return $this->maxImpressionsPerHour;
    }

    /**
     * @param int|null $maxImpressionsPerHour
     */
    public function setMaxImpressionsPerHour(?int $maxImpressionsPerHour): void
    {
        $this->maxImpressionsPerHour = $maxImpressionsPerHour;
    }

}
