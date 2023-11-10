<?php

namespace BusinessGazeta\AdfoxApi\Request\banner\modify;

use BusinessGazeta\AdfoxApi\Enum\Banner\BannerAdLabelEnum;
use BusinessGazeta\AdfoxApi\Enum\Banner\BannerCreativeContentEnum;
use BusinessGazeta\AdfoxApi\Enum\Banner\BannerIsEventsEnum;
use BusinessGazeta\AdfoxApi\Enum\Banner\BannerIsUnplacedEnum;
use BusinessGazeta\AdfoxApi\Enum\Banner\BannerSendToErirEnum;
use BusinessGazeta\AdfoxApi\Enum\Banner\BannerShowMenuEnum;
use BusinessGazeta\AdfoxApi\Enum\Banner\BannerStatusEnum;
use BusinessGazeta\AdfoxApi\Enum\Banner\BannerTargetEnum;
use BusinessGazeta\AdfoxApi\Helper\DateInterface;
use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;
use BusinessGazeta\AdfoxApi\Request\banner\modify\Objects\BannerMediaData;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */
class BaseBanner extends AbstractAdfoxRequest
{
    private ?string $name = null;
    private ?int $targetingProfileID = null;
    private ?DateTime $dateStart = null;
    private ?DateTime $dateEnd = null;
    #[Assert\Range(
        notInRangeMessage: 'Допустимые значения: от 1 до 1000 включительно.',
        min: 1,
        max: 1000
    )]
    private ?int $priority = null;
    private ?BannerStatusEnum $status = null;
    private ?BannerIsEventsEnum $isEvents = null;
    private ?BannerIsUnplacedEnum $isUnplaced = null;
    private ?string $backgroundColor = null;
    private ?string $width = null;
    private ?string $height = null;
    private ?string $imageURL = null;
    private ?string $hitURL = null;
    private ?BannerTargetEnum $target = null;
    private ?string $alt = null;
    private ?array $userN = null;
    private ?array $eventN = null;
    private ?array $hitURLN = null;
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
    private ?int $maxImpressionsPerHour = null;
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
    #[Assert\Range(
        notInRangeMessage: 'Допустимые значения: от 1 до 2147483647.',
        min: 1,
        max: 2147483647
    )]
    private ?int $maxClicksPerHour = null;
    private ?string $trackingURL = null;
    private ?BannerShowMenuEnum $showMenu = null;
    private ?BannerAdLabelEnum $adLabel = null;
    private ?string $domain = null;
    private ?BannerSendToErirEnum $sendToErir = null;
    private ?string $token = null;
    private ?BannerCreativeContentEnum $creativeContentType = null;
    private ?string $okveds = null;
    private ?string $markingDescription = null;
    private ?string $targetURL = null;
    private  ?string $textData = null;
    /**
     * @var BannerMediaData[]
     */
    #[Assert\All([
        new Assert\Type(BannerMediaData::class)
    ])]
    private ?array $mediaData = null;
    private ?array $sendToErirParams = null;

    public function params(): array
    {
        $params = parent::params();
        $params = $this->mergeParams($params, $this->name, 'name');
        $params = $this->mergeParams($params, $this->targetingProfileID, 'targetingProfileID');
        $params = $this->mergeParams($params, $this->dateStart?->format(DateInterface::DATE_FORMAT), 'dateStart');
        $params = $this->mergeParams($params, $this->dateEnd?->format(DateInterface::DATE_FORMAT), 'dateEnd');
        $params = $this->mergeParams($params, $this->priority, 'priority');
        $params = $this->mergeParams($params, $this->status->value, 'status');
        $params = $this->mergeParams($params, $this->isEvents->value, 'isEvents');
        $params = $this->mergeParams($params, $this->isUnplaced->value, 'isUnplaced');
        $params = $this->mergeParams($params, $this->backgroundColor, 'backgroundColor');
        $params = $this->mergeParams($params, $this->width, 'width');
        $params = $this->mergeParams($params, $this->height, 'height');
        $params = $this->mergeParams($params, $this->imageURL, 'imageURL');
        $params = $this->mergeParams($params, $this->hitURL, 'hitURL');
        $params = $this->mergeParams($params, $this->target->value, 'target');
        $params = $this->mergeParams($params, $this->alt, 'alt');
        $users = [];
        if (!is_null($this->userN)) {
            foreach ($this->userN as $key => $user) {
                $users[] = ['user' . $key => $user];
            }
        }
        $params = array_merge($params, ...$users);
        $events = [];
        if (!is_null($this->eventN)) {
            foreach ($this->eventN as $key => $event) {
                $events[] = ['event' . $key => $event];
            }
        }
        $params = array_merge($params, ...$events);
        $hit_urls = [];
        if (!is_null($this->hitURLN)) {
            foreach ($this->hitURLN as $key => $hit_url) {
                $hit_urls[] = ['hitURL' . $key => $hit_url];
            }
        }
        $params = array_merge($params, ...$hit_urls);
        $params = $this->mergeParams($params, $this->maxImpressions, 'maxImpressions');
        $params = $this->mergeParams($params, $this->maxImpressionsPerDay, 'maxImpressionsPerDay');
        $params = $this->mergeParams($params, $this->maxImpressionsPerHour, 'maxImpressionsPerHour');
        $params = $this->mergeParams($params, $this->maxClicks, 'maxClicks');
        $params = $this->mergeParams($params, $this->maxClicksPerDay, 'maxClicksPerDay');
        $params = $this->mergeParams($params, $this->maxClicksPerHour, 'maxClicksPerHour');
        $params = $this->mergeParams($params, $this->trackingURL, 'trackingURL');
        $params = $this->mergeParams($params, $this->showMenu->value, 'showMenu');
        $params = $this->mergeParams($params, $this->adLabel->value, 'adLabel');
        $params = $this->mergeParams($params, $this->domain, 'domain');
        $params = $this->mergeParams($params, $this->sendToErir->value, 'sendToErir');
        if (!is_null($this->sendToErir) && $this->sendToErir === BannerSendToErirEnum::NOT_SEND_TO_ERIR) {
            $params = $this->mergeParams($params, $this->token, 'token');
        }
        $params = $this->mergeParams($params, $this->creativeContentType->value, 'creativeContentType');
        $params = $this->mergeParams($params, $this->okveds, 'okveds[]');
        $params = $this->mergeParams($params, $this->markingDescription, 'markingDescription');
        $params = $this->mergeParams($params, $this->targetURL, 'targetURL');
        $params = $this->mergeParams($params, $this->mediaData, 'mediaData[]');
        $params = $this->mergeParams($params, $this->textData, 'textData[]');
        $send_to_erir_params = [];
        if (!is_null($this->sendToErirParams)) {
            foreach ($this->sendToErirParams as $key => $erir) {
                if (is_int($key)) {
                    $send_to_erir_params['sendToErirParameter' . $key] = $erir;
                } else {
                    $send_to_erir_params['sendToErir' . $key] = $erir;
                }
            }
        }
        $params = array_merge($params, $send_to_erir_params);

        return $params;
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
     * @return BannerStatusEnum|null
     */
    public function getStatus(): ?BannerStatusEnum
    {
        return $this->status;
    }

    /**
     * @param BannerStatusEnum|null $status
     */
    public function setStatus(?BannerStatusEnum $status): void
    {
        $this->status = $status;
    }

    /**
     * @return BannerIsEventsEnum|null
     */
    public function getIsEvents(): ?BannerIsEventsEnum
    {
        return $this->isEvents;
    }

    /**
     * @param BannerIsEventsEnum|null $isEvents
     */
    public function setIsEvents(?BannerIsEventsEnum $isEvents): void
    {
        $this->isEvents = $isEvents;
    }

    /**
     * @return BannerIsUnplacedEnum|null
     */
    public function getIsUnplaced(): ?BannerIsUnplacedEnum
    {
        return $this->isUnplaced;
    }

    /**
     * @param BannerIsUnplacedEnum|null $isUnplaced
     */
    public function setIsUnplaced(?BannerIsUnplacedEnum $isUnplaced): void
    {
        $this->isUnplaced = $isUnplaced;
    }

    /**
     * @return string|null
     */
    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }

    /**
     * @param string|null $backgroundColor
     */
    public function setBackgroundColor(?string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @return string|null
     */
    public function getWidth(): ?string
    {
        return $this->width;
    }

    /**
     * @param string|null $width
     */
    public function setWidth(?string $width): void
    {
        $this->width = $width;
    }

    /**
     * @return string|null
     */
    public function getHeight(): ?string
    {
        return $this->height;
    }

    /**
     * @param string|null $height
     */
    public function setHeight(?string $height): void
    {
        $this->height = $height;
    }

    /**
     * @return string|null
     */
    public function getImageURL(): ?string
    {
        return $this->imageURL;
    }

    /**
     * @param string|null $imageURL
     */
    public function setImageURL(?string $imageURL): void
    {
        $this->imageURL = $imageURL;
    }

    /**
     * @return string|null
     */
    public function getHitURL(): ?string
    {
        return $this->hitURL;
    }

    /**
     * @param string|null $hitURL
     */
    public function setHitURL(?string $hitURL): void
    {
        $this->hitURL = $hitURL;
    }

    /**
     * @return BannerTargetEnum|null
     */
    public function getTarget(): ?BannerTargetEnum
    {
        return $this->target;
    }

    /**
     * @param BannerTargetEnum|null $target
     */
    public function setTarget(?BannerTargetEnum $target): void
    {
        $this->target = $target;
    }

    /**
     * @return string|null
     */
    public function getAlt(): ?string
    {
        return $this->alt;
    }

    /**
     * @param string|null $alt
     */
    public function setAlt(?string $alt): void
    {
        $this->alt = $alt;
    }

    /**
     * @return array|null
     */
    public function getUserN(): ?array
    {
        return $this->userN;
    }

    /**
     * @param array|null $userN
     */
    public function setUserN(?array $userN): void
    {
        $this->userN = $userN;
    }

    /**
     * @return array|null
     */
    public function getEventN(): ?array
    {
        return $this->eventN;
    }

    /**
     * @param array|null $eventN
     */
    public function setEventN(?array $eventN): void
    {
        $this->eventN = $eventN;
    }

    /**
     * @return array|null
     */
    public function getHitURLN(): ?array
    {
        return $this->hitURLN;
    }

    /**
     * @param array|null $hitURLN
     */
    public function setHitURLN(?array $hitURLN): void
    {
        $this->hitURLN = $hitURLN;
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
     * @return int|null
     */
    public function getMaxClicksPerHour(): ?int
    {
        return $this->maxClicksPerHour;
    }

    /**
     * @param int|null $maxClicksPerHour
     */
    public function setMaxClicksPerHour(?int $maxClicksPerHour): void
    {
        $this->maxClicksPerHour = $maxClicksPerHour;
    }

    /**
     * @return string|null
     */
    public function getTrackingURL(): ?string
    {
        return $this->trackingURL;
    }

    /**
     * @param string|null $trackingURL
     */
    public function setTrackingURL(?string $trackingURL): void
    {
        $this->trackingURL = $trackingURL;
    }

    /**
     * @return BannerShowMenuEnum|null
     */
    public function getShowMenu(): ?BannerShowMenuEnum
    {
        return $this->showMenu;
    }

    /**
     * @param BannerShowMenuEnum|null $showMenu
     */
    public function setShowMenu(?BannerShowMenuEnum $showMenu): void
    {
        $this->showMenu = $showMenu;
    }

    /**
     * @return BannerAdLabelEnum|null
     */
    public function getAdLabel(): ?BannerAdLabelEnum
    {
        return $this->adLabel;
    }

    /**
     * @param BannerAdLabelEnum|null $adLabel
     */
    public function setAdLabel(?BannerAdLabelEnum $adLabel): void
    {
        $this->adLabel = $adLabel;
    }

    /**
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }

    /**
     * @param string|null $domain
     */
    public function setDomain(?string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return BannerSendToErirEnum|null
     */
    public function getSendToErir(): ?BannerSendToErirEnum
    {
        return $this->sendToErir;
    }

    /**
     * @param BannerSendToErirEnum|null $sendToErir
     */
    public function setSendToErir(?BannerSendToErirEnum $sendToErir): void
    {
        $this->sendToErir = $sendToErir;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string|null $token
     */
    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return BannerCreativeContentEnum|null
     */
    public function getCreativeContentType(): ?BannerCreativeContentEnum
    {
        return $this->creativeContentType;
    }

    /**
     * @param BannerCreativeContentEnum|null $creativeContentType
     */
    public function setCreativeContentType(?BannerCreativeContentEnum $creativeContentType): void
    {
        $this->creativeContentType = $creativeContentType;
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
    public function getMarkingDescription(): ?string
    {
        return $this->markingDescription;
    }

    /**
     * @param string|null $markingDescription
     */
    public function setMarkingDescription(?string $markingDescription): void
    {
        $this->markingDescription = $markingDescription;
    }

    /**
     * @return string|null
     */
    public function getTargetURL(): ?string
    {
        return $this->targetURL;
    }

    /**
     * @param string|null $targetURL
     */
    public function setTargetURL(?string $targetURL): void
    {
        $this->targetURL = $targetURL;
    }

    /**
     * @return string|null
     */
    public function getTextData(): ?string
    {
        return $this->textData;
    }

    /**
     * @param string|null $textData
     */
    public function setTextData(?string $textData): void
    {
        $this->textData = $textData;
    }

    /**
     * @return array|null
     */
    public function getMediaData(): ?array
    {
        return $this->mediaData;
    }

    /**
     * @param array|null $mediaData
     */
    public function setMediaData(?array $mediaData): void
    {
        $this->mediaData = $mediaData;
    }

    /**
     * @return array|null
     */
    public function getSendToErirParams(): ?array
    {
        return $this->sendToErirParams;
    }

    /**
     * @param array|null $sendToErirParams
     */
    public function setSendToErirParams(?array $sendToErirParams): void
    {
        $this->sendToErirParams = $sendToErirParams;
    }

}
