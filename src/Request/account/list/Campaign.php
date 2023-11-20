<?php

namespace BusinessGazeta\AdfoxApi\Request\account\list;

use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignShowEnum;
use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignShowModeEnum;
use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */

#[Assert\Expression(
    "(this.getActionObjectID() === NULL and this.getCriteriaID() === NULL and this.getShowMode() === NULL) or
     (this.getActionObjectID() !== NULL and this.getDateAddedFrom() === NULL and this.getDateAddedTo() === NULL and this.getSearch()=== NULL)",
    message: 'При выводе таргетирования конкретной кампании (определен actionObjectID), dateAddedFrom, dateAddedTo и search — запрещены.
    При вывоже списка компаний, дополнительные параметры: criteriaID и showMode при дополнительном таргетировании не применяются',
)]
class Campaign extends AbstractAdfoxRequest
{
    private ?int $actionObjectID = null;
    private ?int $superCampaignID = null;
    private ?DateTime $dateAddedFrom = null;
    private ?DateTime $dateAddedTo = null;
    private ?CampaignShowEnum $show = null;
    private ?string $search = null;
    #[Assert\Range(
        notInRangeMessage: 'Допустимые значения: от 1 до 63.',
        min: 1,
        max: 63
    )]
    private ?int $criteriaID = null;
    #[Assert\Expression(
        "!this.isTargetingUser() or this.getCriteriaID() !== NULL",
        message: 'При show = targetingUser необходимо указать дополнительный параметр criteriaID',
    )]
    private ?CampaignShowModeEnum $showMode = null;

    public function params(): array
    {
        $params = parent::params();
        $params = $this->mergeParams($params, $this->actionObjectID, 'actionObjectID');
        $params = $this->mergeParams($params, $this->superCampaignID, 'superCampaignID');
        $params = $this->mergeParams($params, $this->dateAddedFrom?->format('Y-m-d'), 'dateAddedFrom');
        $params = $this->mergeParams($params, $this->dateAddedTo?->format('Y-m-d'), 'dateAddedTo');
        $params = $this->mergeParams($params, $this->show?->value, 'show');
        $params = $this->mergeParams($params, $this->search, 'search');
        $params = $this->mergeParams($params, $this->criteriaID, 'criteriaID');
        $params = $this->mergeParams($params, $this->showMode?->value, 'showMode');


        return [
            'query' => $params
        ];
    }

    /**
     * @return int|null
     */
    public function getActionObjectID(): ?int
    {
        return $this->actionObjectID;
    }

    /**
     * @param int|null $actionObjectID
     */
    public function setActionObjectID(?int $actionObjectID): void
    {
        $this->actionObjectID = $actionObjectID;
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
     * @return DateTime|null
     */
    public function getDateAddedFrom(): ?DateTime
    {
        return $this->dateAddedFrom;
    }

    /**
     * @param DateTime|null $dateAddedFrom
     */
    public function setDateAddedFrom(?DateTime $dateAddedFrom): void
    {
        $this->dateAddedFrom = $dateAddedFrom;
    }

    /**
     * @return DateTime|null
     */
    public function getDateAddedTo(): ?DateTime
    {
        return $this->dateAddedTo;
    }

    /**
     * @param DateTime|null $dateAddedTo
     */
    public function setDateAddedTo(?DateTime $dateAddedTo): void
    {
        $this->dateAddedTo = $dateAddedTo;
    }

    /**
     * @return CampaignShowEnum|null
     */
    public function getShow(): ?CampaignShowEnum
    {
        return $this->show;
    }

    /**
     * @param CampaignShowEnum|null $show
     */
    public function setShow(?CampaignShowEnum $show): void
    {
        $this->show = $show;
    }

    /**
     * @return string|null
     */
    public function getSearch(): ?string
    {
        return $this->search;
    }

    /**
     * @param string|null $search
     */
    public function setSearch(?string $search): void
    {
        $this->search = $search;
    }

    /**
     * @return int|null
     */
    public function getCriteriaID(): ?int
    {
        return $this->criteriaID;
    }

    /**
     * @param int|null $criteriaID
     */
    public function setCriteriaID(?int $criteriaID): void
    {
        $this->criteriaID = $criteriaID;
    }

    /**
     * @return CampaignShowModeEnum|null
     */
    public function getShowMode(): ?CampaignShowModeEnum
    {
        return $this->showMode;
    }

    /**
     * @param CampaignShowModeEnum|null $showMode
     */
    public function setShowMode(?CampaignShowModeEnum $showMode): void
    {
        $this->showMode = $showMode;
    }

    public function isTargetingUser(): bool
    {
        return $this->getShow() === CampaignShowEnum::TARGETING_USER;
    }

}
