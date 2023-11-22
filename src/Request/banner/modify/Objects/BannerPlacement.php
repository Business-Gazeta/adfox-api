<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Request\banner\modify\Objects;

use BusinessGazeta\AdfoxApi\Enum\Banner\BannerPlacementEnum;

class BannerPlacement
{
    private int $ID;
    private BannerPlacementEnum $description;

    public function __construct(int $ID, BannerPlacementEnum $description)
    {
        $this->ID = $ID;
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getID(): int
    {
        return $this->ID;
    }

    /**
     * @param int $ID
     */
    public function setID(int $ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @return BannerPlacementEnum
     */
    public function getDescription(): BannerPlacementEnum
    {
        return $this->description;
    }

    /**
     * @param BannerPlacementEnum $description
     */
    public function setDescription(BannerPlacementEnum $description): void
    {
        $this->description = $description;
    }

    public function getData(string $name): array
    {
        return [$name . $this->getID() => $this->getDescription()->value];
    }

}
