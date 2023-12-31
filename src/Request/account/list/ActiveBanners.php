<?php

namespace BusinessGazeta\AdfoxApi\Request\account\list;

use BusinessGazeta\AdfoxApi\Enum\ActionEnum;
use BusinessGazeta\AdfoxApi\Enum\ObjectEnum;
use BusinessGazeta\AdfoxApi\Helper\DateInterface;
use BusinessGazeta\AdfoxApi\Request\AbstractAdfoxRequest;

/**
 * @link https://yandex.ru/dev/adfox/doc/v.1/account/account-list-activeBanners.html
 */
class ActiveBanners extends AbstractAdfoxRequest
{
        private \DateTime $date;

    /**
     * @param \DateTime $date
     */
    public function __construct(\DateTime $date = null)
    {
        if (!$date) {
            $date = new \DateTime('now', new \DateTimeZone('Europe/Moscow'));
        }
        $this->date = $date;
    }

    public function params(): array
    {
        $params = parent::params();
        return [
            'query' => array_merge(
                $params,
                [
                    'date' => $this->date->format(DateInterface::DATE_FORMAT)
                ]
            )
        ];
    }


}
