<?php

namespace BusinessGazeta\AdfoxApi\Request\zone;

use BusinessGazeta\AdfoxApi\Enum\Zone\ZoneIsAutoRefererEnum;
use BusinessGazeta\AdfoxApi\Enum\Zone\ZoneTemplateTypeIDEnum;
use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */

class BaseZone extends AbstractAdfoxRequest
{
    private ?int $categoryID = null;
    private ?ZoneIsAutoRefererEnum $isAutoReferer = null;
    private ?ZoneTemplateTypeIDEnum $templateTypeID = null;
    private ?string $template = null;
    private ?int $templateExcluded = null;


    public function params(): array
    {
        $params = parent::params();
        $params = $this->mergeParams($params, $this->categoryID, 'categoryID');
        $params = $this->mergeParams($params, $this->isAutoReferer->value, 'isAutoReferer');
        $params = $this->mergeParams($params, $this->templateTypeID->value, 'templateTypeID');
        $params = $this->mergeParams($params, $this->template, 'template');
        $params = $this->mergeParams($params, $this->templateExcluded, 'templateExcluded');

        return $params;
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
     * @return ZoneIsAutoRefererEnum|null
     */
    public function getIsAutoReferer(): ?ZoneIsAutoRefererEnum
    {
        return $this->isAutoReferer;
    }

    /**
     * @param ZoneIsAutoRefererEnum|null $isAutoReferer
     */
    public function setIsAutoReferer(?ZoneIsAutoRefererEnum $isAutoReferer): void
    {
        $this->isAutoReferer = $isAutoReferer;
    }

    /**
     * @return ZoneTemplateTypeIDEnum|null
     */
    public function getTemplateTypeID(): ?ZoneTemplateTypeIDEnum
    {
        return $this->templateTypeID;
    }

    /**
     * @param ZoneTemplateTypeIDEnum|null $templateTypeID
     */
    public function setTemplateTypeID(?ZoneTemplateTypeIDEnum $templateTypeID): void
    {
        $this->templateTypeID = $templateTypeID;
    }

    /**
     * @return string|null
     */
    public function getTemplate(): ?string
    {
        return $this->template;
    }

    /**
     * @param string|null $template
     */
    public function setTemplate(?string $template): void
    {
        $this->template = $template;
    }

    /**
     * @return int|null
     */
    public function getTemplateExcluded(): ?int
    {
        return $this->templateExcluded;
    }

    /**
     * @param int|null $templateExcluded
     */
    public function setTemplateExcluded(?int $templateExcluded): void
    {
        $this->templateExcluded = $templateExcluded;
    }

}
