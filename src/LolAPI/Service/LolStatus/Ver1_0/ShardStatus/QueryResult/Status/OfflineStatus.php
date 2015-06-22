<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Status;

class OfflineStatus implements StatusInterface
{
    /**
     * Returns status code
     * @return string
     */
    public function getCode()
    {
        return 'offline';
    }
}