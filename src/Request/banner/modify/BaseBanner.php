<?php

namespace BusinessGazeta\AdfoxApi\Request\banner\modify;

use BusinessGazeta\AdfoxApi\Helper\DateInterface;
use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */
class BaseBanner extends AbstractAdfoxRequest
{
    private int $objectID;
    private string $name;
    private int $targetingProfileID;
    private \DateTime $dateStart;
    private \DateTime $dateEnd;
    private int $priority;
    private int $status;
    private int $isEvents;
    private  int $isUnplaced;
    private string $backgroundColor;
    private string $width;
    private string $height;
    private string $imageURL;
    private string $hitURL;
    private string $target;
    private string $alt;
    private string $userN;
    private string $eventN;
    private string $hitURLN;
    private int $maxImpressions;
    private int $maxImpressionsPerDay;
    private int $maxImpressionsPerHour;
    private int $maxClicks;
    private int $maxClicksPerDay;
    private int $maxClicksPerHour;
    private string $trackingURL;
    private int $showMenu;
    private int $adLabel;
    private string $domain;
    private int $sendToErir;
    private string $token;
    private int $creativeContentType;
    private string $okveds;
    private string $markingDescription;
    private string $targetURL;
    private  string $textData;
//    private int $ & [mediaData[]=<{"url": "URL медиаданных", "description": "string"}>]
//    private int $sendToErir;

    /**
     * @param \DateTime $date
     */
    public function __construct(int $objectID)
    {
        $this->setObjectID($objectID);
    }

    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['objectID' => $this->getObjectID()]);
        $params = $this->mergeParams($params, $this->getName(), 'name');
        print_r($this);
        die();
        $params = $this->mergeParams($params, $this->getName(), 'name');
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
    public function getUserN(): string
    {
        return $this->userN;
    }

    /**
     * @param string $userN
     */
    public function setUserN(string $userN): void
    {
        $this->userN = $userN;
    }

    /**
     * @return string
     */
    public function getEventN(): string
    {
        return $this->eventN;
    }

    /**
     * @param string $eventN
     */
    public function setEventN(string $eventN): void
    {
        $this->eventN = $eventN;
    }

    /**
     * @return string
     */
    public function getHitURLN(): string
    {
        return $this->hitURLN;
    }

    /**
     * @param string $hitURLN
     */
    public function setHitURLN(string $hitURLN): void
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
}
