<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Status;

class DeployingStatus implements StatusInterface
{
    /**
     * Returns status code
     * @return string
     */
    public function getCode()
    {
        return 'deploying';
    }
}