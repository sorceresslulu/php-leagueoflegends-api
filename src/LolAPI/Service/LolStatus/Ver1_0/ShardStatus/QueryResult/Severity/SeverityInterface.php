<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Severity;

interface SeverityInterface
{
    /**
     * Returns code
     * @return string
     */
    public function getCode();
}