<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Severity\Severities;

use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Severity\SeverityInterface;

class Alert implements SeverityInterface
{
    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return self::SEVERITY_ALERT;
    }
}