<?php

namespace BusinessGazeta\AdfoxApi\Request\bannerType;

use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class Modify extends AbstractAdfoxRequest
{
    private int $objectID;
    private ?string $name = null;
    private  ?int $isOn = null;
    #[Assert\Range(
        notInRangeMessage: 'Допустимые значения: от 1 до 2147483647.',
        min: 1,
        max: 2147483647
    )]
    private ?string $width = null;
    #[Assert\Range(
        notInRangeMessage: 'Допустимые значения: от 1 до 2147483647.',
        min: 1,
        max: 2147483647
    )]
    private ?string $height = null;

    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['objectID' => $this->objectID]);
        $params = $this->mergeParams($params, $this->name, 'name');
        $params = $this->mergeParams($params, $this->isOn, 'isOn');
        $params = $this->mergeParams($params, $this->width, 'width');
        $params = $this->mergeParams($params, $this->height, 'height');

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
    public function getIsOn(): ?int
    {
        return $this->isOn;
    }

    /**
     * @param int|null $isOn
     */
    public function setIsOn(?int $isOn): void
    {
        $this->isOn = $isOn;
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

}
