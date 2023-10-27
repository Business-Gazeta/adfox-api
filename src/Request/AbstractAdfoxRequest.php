<?php

namespace BusinessGazeta\AdfoxApi\Request;

use BusinessGazeta\AdfoxApi\Enum\ActionEnum;
use BusinessGazeta\AdfoxApi\Enum\HttpMethodEnum;
use BusinessGazeta\AdfoxApi\Enum\ObjectEnum;

abstract class AbstractAdfoxRequest implements AdfoxRequestInterface
{
    public const OBJECT = ObjectEnum::ACCOUNT;
    public const ACTION = ActionEnum::LIST;

    private int $limit = 100;
    private int $offset = 0;

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return AbstractAdfoxRequest
     */
    public function setLimit(int $limit): AbstractAdfoxRequest
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     * @return AbstractAdfoxRequest
     */
    public function setOffset(int $offset): AbstractAdfoxRequest
    {
        $this->offset = $offset;
        return $this;
    }

    public function getMethod(): HttpMethodEnum
    {
        return HttpMethodEnum::GET;
    }

    public function params(): array
    {
        $class = explode('\\', get_class($this));
        $name = array_pop($class);
        return [
            'object' => $this::OBJECT->value,
            'action' => $this::ACTION->value,
            'actionObject' => lcfirst($name),
            'encoding' => 'UTF-8',
            'limit' => $this->getLimit(),
            'offset' => $this->getOffset()
        ];
    }
}
