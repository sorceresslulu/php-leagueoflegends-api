<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Status;

interface StatusInterface
{
    const STATUS_ALERT = 'alert';
    const STATUS_DEPLOYING = 'deploying';
    const STATUS_OFFLINE = 'offline';
    const STATUS_ONLINE = 'online';

    /**
     * Returns status code
     * @return string
     */
    public function getCode();
}