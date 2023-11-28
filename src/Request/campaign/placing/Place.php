<?php

namespace BusinessGazeta\AdfoxApi\Request\campaign\placing;


use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignActionStatusEnum;
use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignRotationMethodIdEnum;
use BusinessGazeta\AdfoxApi\Helper\DateInterface;
use BusinessGazeta\AdfoxApi\Request\website\BaseWebsite;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class Place extends BaseWebsite
{
    private int $objectID;
    private int $actionObjectID;
    private CampaignActionStatusEnum $actionStatus;
    private ?CampaignRotationMethodIdEnum $rotationMethodID = null;

    private ?DateTime $dateStart = null;
    private ?DateTime $dateEnd = null;
    private ?int $targetingProfileID = null;

    public function __construct(int $objectID, int $actionObjectID, CampaignActionStatusEnum $actionStatus)
    {
        $this->objectID = $objectID;
        $this->actionObjectID = $actionObjectID;
        $this->actionStatus = $actionStatus;
    }
    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['objectID' => $this->objectID]);
        $params = array_merge($params, ['actionObjectID' => $this->actionObjectID]);
        $params = array_merge($params, ['actionStatus' => $this->actionStatus->value]);

        $params = $this->mergeParams($params, $this->targetingProfileID, 'targetingProfileID');
        $params = $this->mergeParams($params, $this->rotationMethodID?->value, 'rotationMethodID');
        $params = $this->mergeParams($params, $this->dateStart?->format(DateInterface::DATE_FORMAT), 'dateStart');
        $params = $this->mergeParams($params, $this->dateEnd?->format(DateInterface::DATE_FORMAT), 'dateEnd');


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
     * @return int
     */
    public function getActionObjectID(): int
    {
        return $this->actionObjectID;
    }

    /**
     * @param int $actionObjectID
     */
    public function setActionObjectID(int $actionObjectID): void
    {
        $this->actionObjectID = $actionObjectID;
    }

    /**
     * @return CampaignActionStatusEnum
     */
    public function getActionStatus(): CampaignActionStatusEnum
    {
        return $this->actionStatus;
    }

    /**
     * @param CampaignActionStatusEnum $actionStatus
     */
    public function setActionStatus(CampaignActionStatusEnum $actionStatus): void
    {
        $this->actionStatus = $actionStatus;
    }

    /**
     * @return CampaignRotationMethodIdEnum|null
     */
    public function getRotationMethodID(): ?CampaignRotationMethodIdEnum
    {
        return $this->rotationMethodID;
    }

    /**
     * @param CampaignRotationMethodIdEnum|null $rotationMethodID
     */
    public function setRotationMethodID(?CampaignRotationMethodIdEnum $rotationMethodID): void
    {
        $this->rotationMethodID = $rotationMethodID;
    }

    /**
     * @return DateTime|null
     */
    public function getDateStart(): ?DateTime
    {
        return $this->dateStart;
    }

    /**
     * @param DateTime|null $dateStart
     */
    public function setDateStart(?DateTime $dateStart): void
    {
        $this->dateStart = $dateStart;
    }

    /**
     * @return DateTime|null
     */
    public function getDateEnd(): ?DateTime
    {
        return $this->dateEnd;
    }

    /**
     * @param DateTime|null $dateEnd
     */
    public function setDateEnd(?DateTime $dateEnd): void
    {
        $this->dateEnd = $dateEnd;
    }

    /**
     * @return int|null
     */
    public function getTargetingProfileID(): ?int
    {
        return $this->targetingProfileID;
    }

    /**
     * @param int|null $targetingProfileID
     */
    public function setTargetingProfileID(?int $targetingProfileID): void
    {
        $this->targetingProfileID = $targetingProfileID;
    }

}
