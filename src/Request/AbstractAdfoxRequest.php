<?php

namespace BusinessGazeta\AdfoxApi\Request;

use BusinessGazeta\AdfoxApi\Enum\HttpMethodEnum;

abstract class AbstractAdfoxRequest implements AdfoxRequestInterface
{

    private int $limit = 100;
    private int $offset = 0;
    private HttpMethodEnum $method = HttpMethodEnum::GET;

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

    /**
     * @return HttpMethodEnum
     */
    public function getMethod(): HttpMethodEnum
    {
        return $this->method;
    }

    /**
     * @param HttpMethodEnum $method
     * @return $this
     */
    public function setMethod(HttpMethodEnum $method): AbstractAdfoxRequest
    {
        $this->method = $method;
        return $this;
    }

    public function params(): array
    {
        $class = explode('\\', get_class($this));
        $action_object = array_pop($class);
        $action = array_pop($class);
        $object = array_pop($class);
        $data = [
            'encoding' => 'UTF-8',
            'limit' => $this->getLimit(),
            'offset' => $this->getOffset()
        ];
        if ($object === 'Request') {
            $object = $action;
            $action = lcfirst($action_object);
        } else {
            $data = array_merge($data, ['actionObject' => lcfirst($action_object)]);
        }
        return array_merge($data, [
            'object' => $object,
            'action' => $action,
        ]);
//        return [
//            'object' => $object,
//            'action' => $action,
//            'actionObject' => lcfirst($action_object),
//            'encoding' => 'UTF-8',
//            'limit' => $this->getLimit(),
//            'offset' => $this->getOffset()
//        ];
    }

    public function mergeParams(array $params, $param, string $name): array
    {
        if (!is_null($param)) {
            return array_merge($params, [$name => $param]);
        }
        return $params;
    }

}
