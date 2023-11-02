<?php

namespace BusinessGazeta\AdfoxApi\Request\website;

use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */
#[Assert\Expression(
    "this.getSendToErir() !== 1 or (this.getPlatformType() !== NULL and this.getPlatformName() !== NULL)",
    message: 'Если sendToErir = 1, то поля platformName и platformType обязательны для заполнения',
)]
class BaseWebsite extends AbstractAdfoxRequest
{
    private ?int $webmasterID = null;
    private ?int $categoryID = null;
    private ?int $sendToErir = null;
    private ?string $platformName = null;
    private ?int $platformType = null;
    private ?int $contractorID = null;
    #[Assert\Expression(
        "this.getPlatformType() === 2  or this.getPlatformType() === NULL or this.getUrl() starts with 'http'",
        message: 'Поле url обязательно для заполнения и должен начинаться с протокола http или https, 
        если platformType = 0 или platfromType = 1',
    )]
//    #[Assert\Expression(
//        "this.getUrl() starts with 'http'",
//        message: 'URL начинается с протокола http или https'
//    )]
    private ?string $url = null;


    public function params(): array
    {
        $params = parent::params();
        $params = $this->mergeParams($params, $this->webmasterID, 'webmasterID');
        $params = $this->mergeParams($params, $this->categoryID, 'categoryID');
        $params = $this->mergeParams($params, $this->sendToErir, 'sendToErir');
        $params = $this->mergeParams($params, $this->platformName, 'platformName');
        $params = $this->mergeParams($params, $this->platformType, 'platformType');
        $params = $this->mergeParams($params, $this->contractorID, 'contractorID');
        $params = $this->mergeParams($params, $this->url, 'url');

        return [
            'query' => $params
        ];
    }

    /**
     * @return int|null
     */
    public function getWebmasterID(): ?int
    {
        return $this->webmasterID;
    }

    /**
     * @param int|null $webmasterID
     */
    public function setWebmasterID(?int $webmasterID): void
    {
        $this->webmasterID = $webmasterID;
    }

    /**
     * @return int|null
     */
    public function getCategoryID(): ?int
    {
        return $this->categoryID;
    }

    /**
     * @param int|null $categoryID
     */
    public function setCategoryID(?int $categoryID): void
    {
        $this->categoryID = $categoryID;
    }

    /**
     * @return int|null
     */
    public function getSendToErir(): ?int
    {
        return $this->sendToErir;
    }

    /**
     * @param int|null $sendToErir
     */
    public function setSendToErir(?int $sendToErir): void
    {
        $this->sendToErir = $sendToErir;
    }

    /**
     * @return string|null
     */
    public function getPlatformName(): ?string
    {
        return $this->platformName;
    }

    /**
     * @param string|null $platformName
     */
    public function setPlatformName(?string $platformName): void
    {
        $this->platformName = $platformName;
    }

    /**
     * @return int|null
     */
    public function getPlatformType(): ?int
    {
        return $this->platformType;
    }

    /**
     * @param int|null $platformType
     */
    public function setPlatformType(?int $platformType): void
    {
        $this->platformType = $platformType;
    }

    /**
     * @return int|null
     */
    public function getContractorID(): ?int
    {
        return $this->contractorID;
    }

    /**
     * @param int|null $contractorID
     */
    public function setContractorID(?int $contractorID): void
    {
        $this->contractorID = $contractorID;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }


}
