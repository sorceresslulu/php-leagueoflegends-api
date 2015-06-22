<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Severity;

class ErrorSeverity implements SeverityInterface
{
    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return 'error';
    }
}