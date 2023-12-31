<?php

namespace BusinessGazeta\AdfoxApi\Request\campaign;

use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignClickSmoothTypeIdEnum;
use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignCostTypeEnum;
use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignImpressionsSmoothTypeIdEnum;
use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignIsSessionEnum;
use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignIsSimplifiedBannersEnum;
use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignKindEnum;
use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignLogicTypeEnum;
use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignOuterMarkIdEnum;
use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignRotationMethodIdEnum;
use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignSendToErirEnum;
use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignStatusEnum;
use BusinessGazeta\AdfoxApi\Enum\Campaign\CampaignTracingTypeIdEnum;
use BusinessGazeta\AdfoxApi\Helper\DateInterface;
use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;


#[Assert\Expression(
    "(this.getLevel() > 0 and this.getLevel() < 11 and this.getKindIdValue() == 1) or (this.getLevel() == 11 and this.getKindIdValue() == 2) 
    or (this.getLevel() > 11 and this.getLevel() < 21 and this.getKindIdValue() == 3) or this.getKindId() == NULL",
    message: 'Допустимые значения с 1 по 10 включительно — для кампаний вида Гарантия, 11 - для кампаний вида Динамическая монетизация,
    с 12 по 20 - для кампаний вида Промо',
)]
class BaseCampaign extends AbstractAdfoxRequest
{
    private ?int $assistantID = null;
    private ?CampaignKindEnum $kind_id = null;
    #[Assert\Range(
        notInRangeMessage: 'Допустимые значения: от 1 до 20 включительно.',
        min: 1,
        max: 20
    )]
    private ?int $level = null;
    #[Assert\Range(
        notInRangeMessage: 'Допустимые значения: от 1 до 1000 включительно.',
        min: 1,
        max: 1000
    )]
    private ?int $priority = null;
    private ?CampaignStatusEnum $status = null;
    private ?int $sectorID = null;
    #[Assert\Expression(
        "this.getTrafficPercents() !== NULL or this.getRotationMethodID() !== 1",
        message: 'Процент от трафика обязателен, если используется метод ротации по % от трафика',
    )]
    private ?CampaignRotationMethodIdEnum $rotationMethodID = null;
    #[Assert\Range(
        notInRangeMessage: 'Допустимые значения: от 1 до 100 включительно.',
        min: 1,
        max: 100
    )]
    private ?int $trafficPercents = null;
    private ?int $targetingProfileID = null;
    private ?int $sequence = null;
    private ?CampaignTracingTypeIdEnum $tracingTypeID = null;
    private ?CampaignIsSessionEnum $isSession = null;
    private ?CampaignIsSimplifiedBannersEnum $isSimplifiedBanners = null;
    private ?CampaignImpressionsSmoothTypeIdEnum $impressionsSmoothTypeID = null;
    private ?CampaignClickSmoothTypeIdEnum $clicksSmoothTypeID = null;
    #[Assert\Range(
        notInRangeMessage: 'Допустимые значения: от 1 до 2147483647.',
        min: 1,
        max: 2147483647
    )]
    private ?int $maxImpressions = null;
    #[Assert\Range(
        notInRangeMessage: 'Допустимые значения: от 1 до 2147483647.',
        min: 1,
        max: 2147483647
    )]
    private ?int $maxImpressionsPerDay = null;
    #[Assert\Range(
        notInRangeMessage: 'Допустимые значения: от 1 до 2147483647.',
        min: 1,
        max: 2147483647
    )]
    private ?int $maxClicks = null;
    #[Assert\Range(
        notInRangeMessage: 'Допустимые значения: от 1 до 2147483647.',
        min: 1,
        max: 2147483647
    )]
    private ?int $maxClicksPerDay = null;
    private ?DateTime $dateStart = null;
    private ?DateTime $dateEnd = null;
    private ?CampaignLogicTypeEnum $logicType = null;
    #[Assert\Range(
        notInRangeMessage: 'Допустимые значения: от 1 до 99999.',
        min: 1,
        max: 99999
    )]
    #[Assert\Expression(
        "this !== NULL or this.getKindIdValue() !== 2",
        message: 'Пороговое значение CPM (обязательный параметр) для рекламной кампании вида Динамическая монетизация.',
    )]
    private ?int $cpm = null;
    private ?CampaignSendToErirEnum $sendToErir = null;
    #[Assert\Expression(
        "this !== NULL or this.getSendToErirValue() !== 1",
        message: 'Идентификатор договора. Обязательно для заполнения, если передавать данные в ЕРИР',
    )]
    private ?int $contractID = null;
    private ?CampaignOuterMarkIdEnum $outerMarkID = null;
    private ?CampaignCostTypeEnum $costType = null;
    private ?string $okveds = null;
    private ?string $markingAdvertiserInfo = null;

    public function params(): array
    {
        $params = parent::params();
        $params = $this->mergeParams($params, $this->assistantID, 'assistantID');
        $params = $this->mergeParams($params, $this->kind_id?->value, 'kind_id');
        $params = $this->mergeParams($params, $this->level, 'level');
        $params = $this->mergeParams($params, $this->priority, 'priority');
        $params = $this->mergeParams($params, $this->status?->value, 'status');
        $params = $this->mergeParams($params, $this->sectorID, 'sectorID');
        $params = $this->mergeParams($params, $this->rotationMethodID?->value, 'rotationMethodID');
        $params = $this->mergeParams($params, $this->trafficPercents, 'trafficPercents');
        $params = $this->mergeParams($params, $this->targetingProfileID, 'targetingProfileID');
        $params = $this->mergeParams($params, $this->sequence, 'sequence');
        $params = $this->mergeParams($params, $this->tracingTypeID?->value, 'tracingTypeID');
        $params = $this->mergeParams($params, $this->isSession?->value, 'isSession');
        $params = $this->mergeParams($params, $this->isSimplifiedBanners?->value, 'isSimplifiedBanners');
        $params = $this->mergeParams($params, $this->impressionsSmoothTypeID?->value, 'impressionsSmoothTypeID');
        $params = $this->mergeParams($params, $this->clicksSmoothTypeID?->value, 'clicksSmoothTypeID');
        $params = $this->mergeParams($params, $this->maxImpressions, 'maxImpressions');
        $params = $this->mergeParams($params, $this->maxImpressionsPerDay, 'maxImpressionsPerDay');
        $params = $this->mergeParams($params, $this->maxClicks, 'maxClicks');
        $params = $this->mergeParams($params, $this->maxClicksPerDay, 'maxClicksPerDay');
        $params = $this->mergeParams($params, $this->dateStart?->format(DateInterface::DATE_FORMAT), 'dateStart');
        $params = $this->mergeParams($params, $this->dateEnd?->format(DateInterface::DATE_FORMAT), 'dateEnd');
        $params = $this->mergeParams($params, $this->logicType?->value, 'logicType');
        $params = $this->mergeParams($params, $this->cpm, 'cpm');
        $params = $this->mergeParams($params, $this->sendToErir?->value, 'sendToErir');
        $params = $this->mergeParams($params, $this->contractID, 'contractID');
        $params = $this->mergeParams($params, $this->outerMarkID?->value, 'outerMarkID');
        $params = $this->mergeParams($params, $this->costType?->value, 'costType');
        $okveds = [];
        if (!is_null($this->okveds)) {
            foreach ($this->okveds as $okevd) {
                $okveds[] = ['okveds[]' => $okevd];
            }
        }
        $params = array_merge($params, ...$okveds);
        $params = $this->mergeParams($params, $this->markingAdvertiserInfo, 'markingAdvertiserInfo');

        return $params;
    }

    /**
     * @return int|null
     */
    public function getAssistantID(): ?int
    {
        return $this->assistantID;
    }

    /**
     * @param int|null $assistantID
     */
    public function setAssistantID(?int $assistantID): void
    {
        $this->assistantID = $assistantID;
    }

    /**
     * @return CampaignKindEnum|null
     */
    public function getKindId(): ?CampaignKindEnum
    {
        return $this->kind_id;
    }

    /**
     * @return int|null
     */
    public function getKindIdValue(): ?int
    {
        return $this->kind_id?->value;
    }

    /**
     * @param CampaignKindEnum|null $kind_id
     */
    public function setKindId(?CampaignKindEnum $kind_id): void
    {
        $this->kind_id = $kind_id;
    }

    /**
     * @return int|null
     */
    public function getLevel(): ?int
    {
        return $this->level;
    }

    /**
     * @param int|null $level
     */
    public function setLevel(?int $level): void
    {
        $this->level = $level;
    }

    /**
     * @return int|null
     */
    public function getPriority(): ?int
    {
        return $this->priority;
    }

    /**
     * @param int|null $priority
     */
    public function setPriority(?int $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @return CampaignStatusEnum|null
     */
    public function getStatus(): ?CampaignStatusEnum
    {
        return $this->status;
    }

    /**
     * @param CampaignStatusEnum|null $status
     */
    public function setStatus(?CampaignStatusEnum $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int|null
     */
    public function getSectorID(): ?int
    {
        return $this->sectorID;
    }

    /**
     * @param int|null $sectorID
     */
    public function setSectorID(?int $sectorID): void
    {
        $this->sectorID = $sectorID;
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
     * @return int|null
     */
    public function getTrafficPercents(): ?int
    {
        return $this->trafficPercents;
    }

    /**
     * @param int|null $trafficPercents
     */
    public function setTrafficPercents(?int $trafficPercents): void
    {
        $this->trafficPercents = $trafficPercents;
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

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param int|null $sequence
     */
    public function setSequence(?int $sequence): void
    {
        $this->sequence = $sequence;
    }

    /**
     * @return CampaignTracingTypeIdEnum|null
     */
    public function getTracingTypeID(): ?CampaignTracingTypeIdEnum
    {
        return $this->tracingTypeID;
    }

    /**
     * @param CampaignTracingTypeIdEnum|null $tracingTypeID
     */
    public function setTracingTypeID(?CampaignTracingTypeIdEnum $tracingTypeID): void
    {
        $this->tracingTypeID = $tracingTypeID;
    }

    /**
     * @return CampaignIsSessionEnum|null
     */
    public function getIsSession(): ?CampaignIsSessionEnum
    {
        return $this->isSession;
    }

    /**
     * @param CampaignIsSessionEnum|null $isSession
     */
    public function setIsSession(?CampaignIsSessionEnum $isSession): void
    {
        $this->isSession = $isSession;
    }

    /**
     * @return CampaignIsSimplifiedBannersEnum|null
     */
    public function getIsSimplifiedBanners(): ?CampaignIsSimplifiedBannersEnum
    {
        return $this->isSimplifiedBanners;
    }

    /**
     * @param CampaignIsSimplifiedBannersEnum|null $isSimplifiedBanners
     */
    public function setIsSimplifiedBanners(?CampaignIsSimplifiedBannersEnum $isSimplifiedBanners): void
    {
        $this->isSimplifiedBanners = $isSimplifiedBanners;
    }

    /**
     * @return CampaignImpressionsSmoothTypeIdEnum|null
     */
    public function getImpressionsSmoothTypeID(): ?CampaignImpressionsSmoothTypeIdEnum
    {
        return $this->impressionsSmoothTypeID;
    }

    /**
     * @param CampaignImpressionsSmoothTypeIdEnum|null $impressionsSmoothTypeID
     */
    public function setImpressionsSmoothTypeID(?CampaignImpressionsSmoothTypeIdEnum $impressionsSmoothTypeID): void
    {
        $this->impressionsSmoothTypeID = $impressionsSmoothTypeID;
    }

    /**
     * @return CampaignClickSmoothTypeIdEnum|null
     */
    public function getClicksSmoothTypeID(): ?CampaignClickSmoothTypeIdEnum
    {
        return $this->clicksSmoothTypeID;
    }

    /**
     * @param CampaignClickSmoothTypeIdEnum|null $clicksSmoothTypeID
     */
    public function setClicksSmoothTypeID(?CampaignClickSmoothTypeIdEnum $clicksSmoothTypeID): void
    {
        $this->clicksSmoothTypeID = $clicksSmoothTypeID;
    }

    /**
     * @return int|null
     */
    public function getMaxImpressions(): ?int
    {
        return $this->maxImpressions;
    }

    /**
     * @param int|null $maxImpressions
     */
    public function setMaxImpressions(?int $maxImpressions): void
    {
        $this->maxImpressions = $maxImpressions;
    }

    /**
     * @return int|null
     */
    public function getMaxImpressionsPerDay(): ?int
    {
        return $this->maxImpressionsPerDay;
    }

    /**
     * @param int|null $maxImpressionsPerDay
     */
    public function setMaxImpressionsPerDay(?int $maxImpressionsPerDay): void
    {
        $this->maxImpressionsPerDay = $maxImpressionsPerDay;
    }

    /**
     * @return int|null
     */
    public function getMaxClicks(): ?int
    {
        return $this->maxClicks;
    }

    /**
     * @param int|null $maxClicks
     */
    public function setMaxClicks(?int $maxClicks): void
    {
        $this->maxClicks = $maxClicks;
    }

    /**
     * @return int|null
     */
    public function getMaxClicksPerDay(): ?int
    {
        return $this->maxClicksPerDay;
    }

    /**
     * @param int|null $maxClicksPerDay
     */
    public function setMaxClicksPerDay(?int $maxClicksPerDay): void
    {
        $this->maxClicksPerDay = $maxClicksPerDay;
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
     * @return CampaignLogicTypeEnum|null
     */
    public function getLogicType(): ?CampaignLogicTypeEnum
    {
        return $this->logicType;
    }

    /**
     * @param CampaignLogicTypeEnum|null $logicType
     */
    public function setLogicType(?CampaignLogicTypeEnum $logicType): void
    {
        $this->logicType = $logicType;
    }

    /**
     * @return int|null
     */
    public function getCpm(): ?int
    {
        return $this->cpm;
    }

    /**
     * @param int|null $cpm
     */
    public function setCpm(?int $cpm): void
    {
        $this->cpm = $cpm;
    }

    /**
     * @return CampaignSendToErirEnum|null
     */
    public function getSendToErir(): ?CampaignSendToErirEnum
    {
        return $this->sendToErir;
    }

    /**
     * @return int|null
     */
    public function getSendToErirValue(): ?int
    {
        return $this->sendToErir?->value;
    }

    /**
     * @param CampaignSendToErirEnum|null $sendToErir
     */
    public function setSendToErir(?CampaignSendToErirEnum $sendToErir): void
    {
        $this->sendToErir = $sendToErir;
    }

    /**
     * @return int|null
     */
    public function getContractID(): ?int
    {
        return $this->contractID;
    }

    /**
     * @param int|null $contractID
     */
    public function setContractID(?int $contractID): void
    {
        $this->contractID = $contractID;
    }

    /**
     * @return CampaignOuterMarkIdEnum|null
     */
    public function getOuterMarkID(): ?CampaignOuterMarkIdEnum
    {
        return $this->outerMarkID;
    }

    /**
     * @param CampaignOuterMarkIdEnum|null $outerMarkID
     */
    public function setOuterMarkID(?CampaignOuterMarkIdEnum $outerMarkID): void
    {
        $this->outerMarkID = $outerMarkID;
    }

    /**
     * @return CampaignCostTypeEnum|null
     */
    public function getCostType(): ?CampaignCostTypeEnum
    {
        return $this->costType;
    }

    /**
     * @param CampaignCostTypeEnum|null $costType
     */
    public function setCostType(?CampaignCostTypeEnum $costType): void
    {
        $this->costType = $costType;
    }

    /**
     * @return string|null
     */
    public function getOkveds(): ?string
    {
        return $this->okveds;
    }

    /**
     * @param string|null $okveds
     */
    public function setOkveds(?string $okveds): void
    {
        $this->okveds = $okveds;
    }

    /**
     * @return string|null
     */
    public function getMarkingAdvertiserInfo(): ?string
    {
        return $this->markingAdvertiserInfo;
    }

    /**
     * @param string|null $markingAdvertiserInfo
     */
    public function setMarkingAdvertiserInfo(?string $markingAdvertiserInfo): void
    {
        $this->markingAdvertiserInfo = $markingAdvertiserInfo;
    }

}
