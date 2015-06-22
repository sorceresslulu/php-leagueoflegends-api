<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Status;

interface StatusInterface
{
    /**
     * Returns status code
     * @return string
     */
    public function getCode();
}