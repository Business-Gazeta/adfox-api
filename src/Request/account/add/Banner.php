<?php

namespace BusinessGazeta\AdfoxApi\Request\account\add;

use BusinessGazeta\AdfoxApi\Request\banner\modify\BaseBanner;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */

#[Assert\Expression(
    "this.getTemplateID() | this.getBannerTypeID()",
    message: 'Параметр bannerTypeID обязателен, если не задан templateID',
)]
class Banner extends BaseBanner
{
    private int $campaignID;
    private int $templateID;
    private ?int $bannerTypeID = null;
    private ?string $getURL = null;

    public function __construct(int $campaignID, int $templateID)
    {
        $this->campaignID = $campaignID;
        $this->templateID = $templateID;
    }

    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['campaignID' => $this->campaignID]);
        $params = array_merge($params, ['templateID' => $this->templateID]);
        $params = $this->mergeParams($params, $this->bannerTypeID, 'bannerTypeID');
        $params = $this->mergeParams($params, $this->getURL, 'getURL');

        return [
            'query' => $params
        ];
    }

    /**
     * @return int
     */
    public function getCampaignID(): int
    {
        return $this->campaignID;
    }

    /**
     * @param int $campaignID
     */
    public function setCampaignID(int $campaignID): void
    {
        $this->campaignID = $campaignID;
    }

    /**
     * @return int
     */
    public function getTemplateID(): int
    {
        return $this->templateID;
    }

    /**
     * @param int $templateID
     */
    public function setTemplateID(int $templateID): void
    {
        $this->templateID = $templateID;
    }

    /**
     * @return int|null
     */
    public function getBannerTypeID(): ?int
    {
        return $this->bannerTypeID;
    }

    /**
     * @param int|null $bannerTypeID
     */
    public function setBannerTypeID(?int $bannerTypeID): void
    {
        $this->bannerTypeID = $bannerTypeID;
    }

    /**
     * @return string|null
     */
    public function getGetURL(): ?string
    {
        return $this->getURL;
    }

    /**
     * @param string|null $getURL
     */
    public function setGetURL(?string $getURL): void
    {
        $this->getURL = $getURL;
    }

}
