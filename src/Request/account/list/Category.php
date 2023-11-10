<?php

namespace BusinessGazeta\AdfoxApi\Request\account\list;

use BusinessGazeta\AdfoxApi\Enum\Category\CategoryTypeEnum;
use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */


class Category extends AbstractAdfoxRequest
{
    private ?int $actionObjectID = null;
    private ?CategoryTypeEnum $type = null;

    public function params(): array
    {
        $params = parent::params();
        $params = $this->mergeParams($params, $this->actionObjectID, 'actionObjectID');
        $params = $this->mergeParams($params, $this->type->value, 'type');

        return [
            'query' => $params
        ];
    }

    /**
     * @return int|null
     */
    public function getActionObjectID(): ?int
    {
        return $this->actionObjectID;
    }

    /**
     * @param int|null $actionObjectID
     */
    public function setActionObjectID(?int $actionObjectID): void
    {
        $this->actionObjectID = $actionObjectID;
    }

    /**
     * @return CategoryTypeEnum|null
     */
    public function getType(): ?CategoryTypeEnum
    {
        return $this->type;
    }

    /**
     * @param CategoryTypeEnum|null $type
     */
    public function setType(?CategoryTypeEnum $type): void
    {
        $this->type = $type;
    }

}
