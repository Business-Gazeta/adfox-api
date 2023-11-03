<?php

namespace BusinessGazeta\AdfoxApi\Request\account\modify;

use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class Category extends AbstractAdfoxRequest
{
    private int $actionObjectID;
    private ?string $name;
    private ?int $type = null;
    private ?int $timeout = null;

    public function __construct(int $actionObjectID)
    {
        $this->actionObjectID = $actionObjectID;
    }

    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['actionObjectID' => $this->actionObjectID]);
        $params = $this->mergeParams($params, $this->name, 'name');
        $params = $this->mergeParams($params, $this->type, 'type');
        $params = $this->mergeParams($params, $this->timeout, 'timeout');

        return [
            'query' => $params
        ];
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
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param int|null $type
     */
    public function setType(?int $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int|null
     */
    public function getTimeout(): ?int
    {
        return $this->timeout;
    }

    /**
     * @param int|null $timeout
     */
    public function setTimeout(?int $timeout): void
    {
        $this->timeout = $timeout;
    }

}
