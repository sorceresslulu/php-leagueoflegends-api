<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Severity\Severities;

use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Severity\SeverityInterface;

class Info implements SeverityInterface
{
    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return self::SEVERITY_INFO;
    }
}