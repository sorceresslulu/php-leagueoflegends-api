<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Status\Statuses;

use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Status\StatusInterface;

class Alert implements StatusInterface
{
    /**
     * Returns status code
     * @return string
     */
    public function getCode()
    {
        return self::STATUS_ALERT;
    }
}