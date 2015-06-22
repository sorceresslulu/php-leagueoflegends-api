<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Status\Statuses;

use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Status\StatusInterface;

class Offline implements StatusInterface
{
    /**
     * Returns status code
     * @return string
     */
    public function getCode()
    {
        return self::STATUS_OFFLINE;
    }
}