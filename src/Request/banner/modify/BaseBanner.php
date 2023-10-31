<?php

namespace BusinessGazeta\AdfoxApi\Request\banner\modify;

use BusinessGazeta\AdfoxApi\Helper\DateInterface;
use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;
use BusinessGazeta\AdfoxApi\Request\banner\modify\Objects\BannerMediaData;
use BusinessGazeta\AdfoxApi\Types\BannerSendToErirTypes;
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
    private ?int $status = null;
    private ?int $isEvents = null;
    private ?int $isUnplaced = null;
    private ?string $backgroundColor = null;
    private ?string $width = null;
    private ?string $height = null;
    private ?string $imageURL = null;
    private ?string $hitURL = null;
    private ?string $target = null;
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
    private ?int $showMenu = null;
    private ?int $adLabel = null;
    private ?string $domain = null;
    private ?int $sendToErir = null;
    private ?string $token = null;
    private ?int $creativeContentType = null;
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
        $params = $this->mergeParams($params, $this->dateStart->format(DateInterface::DATE_FORMAT), 'dateStart');
        $params = $this->mergeParams($params, $this->dateEnd->format(DateInterface::DATE_FORMAT), 'dateEnd');
        $params = $this->mergeParams($params, $this->priority, 'priority');
        $params = $this->mergeParams($params, $this->status, 'status');
        $params = $this->mergeParams($params, $this->isEvents, 'isEvents');
        $params = $this->mergeParams($params, $this->isUnplaced, 'isUnplaced');
        $params = $this->mergeParams($params, $this->backgroundColor, 'backgroundColor');
        $params = $this->mergeParams($params, $this->width, 'width');
        $params = $this->mergeParams($params, $this->height, 'height');
        $params = $this->mergeParams($params, $this->imageURL, 'imageURL');
        $params = $this->mergeParams($params, $this->hitURL, 'hitURL');
        $params = $this->mergeParams($params, $this->target, 'target');
        $params = $this->mergeParams($params, $this->alt, 'alt');
        $users = [];
        if (!is_null($this->userN)) {
            foreach ($this->userN as $key => $user) {
                $users[] = ['user' . $key => $user];
            }
        }
        $params = array_merge($params, $users);
        $events = [];
        if (!is_null($this->eventN)) {
            foreach ($this->eventN as $key => $event) {
                $events[] = ['event' . $key => $event];
            }
        }
        $params = array_merge($params, $events);
        $hit_urls = [];
        if (!is_null($this->hitURLN)) {
            foreach ($this->hitURLN as $key => $hit_url) {
                $hit_urls[] = ['hitURL' . $key => $hit_url];
            }
        }
        $params = array_merge($params, $hit_urls);
        $params = $this->mergeParams($params, $this->maxImpressions, 'maxImpressions');
        $params = $this->mergeParams($params, $this->maxImpressionsPerDay, 'maxImpressionsPerDay');
        $params = $this->mergeParams($params, $this->maxImpressionsPerHour, 'maxImpressionsPerHour');
        $params = $this->mergeParams($params, $this->maxClicks, 'maxClicks');
        $params = $this->mergeParams($params, $this->maxClicksPerDay, 'maxClicksPerDay');
        $params = $this->mergeParams($params, $this->maxClicksPerHour, 'maxClicksPerHour');
        $params = $this->mergeParams($params, $this->trackingURL, 'trackingURL');
        $params = $this->mergeParams($params, $this->showMenu, 'showMenu');
        $params = $this->mergeParams($params, $this->adLabel, 'adLabel');
        $params = $this->mergeParams($params, $this->domain, 'domain');
        $params = $this->mergeParams($params, $this->sendToErir, 'sendToErir');
        if (!is_null($this->sendToErir) && $this->sendToErir === BannerSendToErirTypes::NOT_SEND_TO_ERIR) {
            $params = $this->mergeParams($params, $this->token, 'token');
        }
        $params = $this->mergeParams($params, $this->creativeContentType, 'creativeContentType');
        $params = $this->mergeParams($params, $this->okveds, 'okveds[]');
        $params = $this->mergeParams($params, $this->targetURL, 'targetURL');
        $params = $this->mergeParams($params, $this->mediaData, 'mediaData[]');
        $send_to_erir_params = [];
        if (!is_null($this->sendToErirParams)) {
            foreach ($this->sendToErirParams as $key => $erir) {
                if (is_int($key)) {
                    $send_to_erir_params[] = ['sendToErirParameter' . $key => $erir];
                } else {
                    $send_to_erir_params[] = ['sendToErir' . $key => $erir];
                }
            }
        }
        $params = array_merge($params, $send_to_erir_params);

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
    public function getTargetingProfileID(): int
    {
        return $this->targetingProfileID;
    }

    /**
     * @param int $targetingProfileID
     */
    public function setTargetingProfileID(int $targetingProfileID): void
    {
        $this->targetingProfileID = $targetingProfileID;
    }

    /**
     * @return \DateTime
     */
    public function getDateStart(): \DateTime
    {
        return $this->dateStart;
    }

    /**
     * @param \DateTime $dateStart
     */
    public function setDateStart(\DateTime $dateStart): void
    {
        $this->dateStart = $dateStart;
    }

    /**
     * @return \DateTime
     */
    public function getDateEnd(): \DateTime
    {
        return $this->dateEnd;
    }

    /**
     * @param \DateTime $dateEnd
     */
    public function setDateEnd(\DateTime $dateEnd): void
    {
        $this->dateEnd = $dateEnd;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     */
    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getIsEvents(): int
    {
        return $this->isEvents;
    }

    /**
     * @param int $isEvents
     */
    public function setIsEvents(int $isEvents): void
    {
        $this->isEvents = $isEvents;
    }

    /**
     * @return int
     */
    public function getIsUnplaced(): int
    {
        return $this->isUnplaced;
    }

    /**
     * @param int $isUnplaced
     */
    public function setIsUnplaced(int $isUnplaced): void
    {
        $this->isUnplaced = $isUnplaced;
    }

    /**
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->backgroundColor;
    }

    /**
     * @param string $backgroundColor
     */
    public function setBackgroundColor(string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @return string
     */
    public function getWidth(): string
    {
        return $this->width;
    }

    /**
     * @param string $width
     */
    public function setWidth(string $width): void
    {
        $this->width = $width;
    }

    /**
     * @return string
     */
    public function getHeight(): string
    {
        return $this->height;
    }

    /**
     * @param string $height
     */
    public function setHeight(string $height): void
    {
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getImageURL(): string
    {
        return $this->imageURL;
    }

    /**
     * @param string $imageURL
     */
    public function setImageURL(string $imageURL): void
    {
        $this->imageURL = $imageURL;
    }

    /**
     * @return string
     */
    public function getHitURL(): string
    {
        return $this->hitURL;
    }

    /**
     * @param string $hitURL
     */
    public function setHitURL(string $hitURL): void
    {
        $this->hitURL = $hitURL;
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * @param string $target
     */
    public function setTarget(string $target): void
    {
        $this->target = $target;
    }

    /**
     * @return string
     */
    public function getAlt(): string
    {
        return $this->alt;
    }

    /**
     * @param string $alt
     */
    public function setAlt(string $alt): void
    {
        $this->alt = $alt;
    }

    /**
     * @return string
     */
    public function getUserN(): array
    {
        return $this->userN;
    }

    /**
     * @param array $userN
     */
    public function setUserN(array $userN): void
    {
        $this->userN = $userN;
    }

    /**
     * @return array
     */
    public function getEventN(): array
    {
        return $this->eventN;
    }

    /**
     * @param array $eventN
     */
    public function setEventN(array $eventN): void
    {
        $this->eventN = $eventN;
    }

    /**
     * @return array
     */
    public function getHitURLN(): array
    {
        return $this->hitURLN;
    }

    /**
     * @param array $hitURLN
     */
    public function setHitURLN(array $hitURLN): void
    {
        $this->hitURLN = $hitURLN;
    }

    /**
     * @return int
     */
    public function getMaxImpressions(): int
    {
        return $this->maxImpressions;
    }

    /**
     * @param int $maxImpressions
     */
    public function setMaxImpressions(int $maxImpressions): void
    {
        $this->maxImpressions = $maxImpressions;
    }

    /**
     * @return int
     */
    public function getMaxImpressionsPerDay(): int
    {
        return $this->maxImpressionsPerDay;
    }

    /**
     * @param int $maxImpressionsPerDay
     */
    public function setMaxImpressionsPerDay(int $maxImpressionsPerDay): void
    {
        $this->maxImpressionsPerDay = $maxImpressionsPerDay;
    }

    /**
     * @return int
     */
    public function getMaxImpressionsPerHour(): int
    {
        return $this->maxImpressionsPerHour;
    }

    /**
     * @param int $maxImpressionsPerHour
     */
    public function setMaxImpressionsPerHour(int $maxImpressionsPerHour): void
    {
        $this->maxImpressionsPerHour = $maxImpressionsPerHour;
    }

    /**
     * @return int
     */
    public function getMaxClicks(): int
    {
        return $this->maxClicks;
    }

    /**
     * @param int $maxClicks
     */
    public function setMaxClicks(int $maxClicks): void
    {
        $this->maxClicks = $maxClicks;
    }

    /**
     * @return int
     */
    public function getMaxClicksPerDay(): int
    {
        return $this->maxClicksPerDay;
    }

    /**
     * @param int $maxClicksPerDay
     */
    public function setMaxClicksPerDay(int $maxClicksPerDay): void
    {
        $this->maxClicksPerDay = $maxClicksPerDay;
    }

    /**
     * @return int
     */
    public function getMaxClicksPerHour(): int
    {
        return $this->maxClicksPerHour;
    }

    /**
     * @param int $maxClicksPerHour
     */
    public function setMaxClicksPerHour(int $maxClicksPerHour): void
    {
        $this->maxClicksPerHour = $maxClicksPerHour;
    }

    /**
     * @return string
     */
    public function getTrackingURL(): string
    {
        return $this->trackingURL;
    }

    /**
     * @param string $trackingURL
     */
    public function setTrackingURL(string $trackingURL): void
    {
        $this->trackingURL = $trackingURL;
    }

    /**
     * @return int
     */
    public function getShowMenu(): int
    {
        return $this->showMenu;
    }

    /**
     * @param int $showMenu
     */
    public function setShowMenu(int $showMenu): void
    {
        $this->showMenu = $showMenu;
    }

    /**
     * @return int
     */
    public function getAdLabel(): int
    {
        return $this->adLabel;
    }

    /**
     * @param int $adLabel
     */
    public function setAdLabel(int $adLabel): void
    {
        $this->adLabel = $adLabel;
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return int
     */
    public function getSendToErir(): int
    {
        return $this->sendToErir;
    }

    /**
     * @param int $sendToErir
     */
    public function setSendToErir(int $sendToErir): void
    {
        $this->sendToErir = $sendToErir;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return int
     */
    public function getCreativeContentType(): int
    {
        return $this->creativeContentType;
    }

    /**
     * @param int $creativeContentType
     */
    public function setCreativeContentType(int $creativeContentType): void
    {
        $this->creativeContentType = $creativeContentType;
    }

    /**
     * @return string
     */
    public function getOkveds(): string
    {
        return $this->okveds;
    }

    /**
     * @param string $okveds
     */
    public function setOkveds(string $okveds): void
    {
        $this->okveds = $okveds;
    }

    /**
     * @return string
     */
    public function getMarkingDescription(): string
    {
        return $this->markingDescription;
    }

    /**
     * @param string $markingDescription
     */
    public function setMarkingDescription(string $markingDescription): void
    {
        $this->markingDescription = $markingDescription;
    }

    /**
     * @return string
     */
    public function getTargetURL(): string
    {
        return $this->targetURL;
    }

    /**
     * @param string $targetURL
     */
    public function setTargetURL(string $targetURL): void
    {
        $this->targetURL = $targetURL;
    }

    /**
     * @return string
     */
    public function getTextData(): string
    {
        return $this->textData;
    }

    /**
     * @param string $textData
     */
    public function setTextData(string $textData): void
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
