<?php

namespace BusinessGazeta\AdfoxApi\Request\account\add;

use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class Position extends AbstractAdfoxRequest
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function params(): array
    {
        $params = parent::params();
        $params = array_merge($params, ['name' => $this->name]);

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

}
