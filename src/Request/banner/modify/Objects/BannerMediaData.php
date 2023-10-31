<?php

declare(strict_types=1);

namespace BusinessGazeta\AdfoxApi\Request\banner\modify\Objects;

class BannerMediaData
{
    private string $url;
    private ?string $description = null;

    public function __construct(string $url)
    {
        $this->url = $url;
    }
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

}
