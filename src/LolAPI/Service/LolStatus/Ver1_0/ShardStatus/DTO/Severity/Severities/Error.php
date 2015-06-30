<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Severity\Severities;

use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Severity\SeverityInterface;

class Error implements SeverityInterface
{
    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return self::SEVERITY_ERROR;
    }
}