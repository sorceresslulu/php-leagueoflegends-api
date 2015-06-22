<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Severity;

class InfoSeverity implements SeverityInterface
{
    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return 'info';
    }
}