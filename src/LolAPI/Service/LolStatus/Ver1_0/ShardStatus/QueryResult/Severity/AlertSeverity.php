<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Severity;

class AlertSeverity implements SeverityInterface
{
    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return 'alert';
    }
}