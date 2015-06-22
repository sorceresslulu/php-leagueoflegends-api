<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Status;

class AlertStatus implements StatusInterface
{
    /**
     * Returns status code
     * @return string
     */
    public function getCode()
    {
        return 'alert';
    }
}