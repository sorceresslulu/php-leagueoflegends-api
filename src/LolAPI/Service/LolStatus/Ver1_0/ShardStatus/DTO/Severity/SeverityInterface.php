<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Severity;

interface SeverityInterface
{
    const SEVERITY_ALERT = 'alert';
    const SEVERITY_ERROR = 'error';
    const SEVERITY_INFO = 'info';

    /**
     * Returns code
     * @return string
     */
    public function getCode();
}