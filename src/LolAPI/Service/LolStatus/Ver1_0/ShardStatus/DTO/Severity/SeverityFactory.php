<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Severity;

use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Severity\Severities\Alert;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Severity\Severities\Error;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Severity\Severities\Info;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Severity\Severities\Unknown;

class SeverityFactory
{
    /**
     * Create and returns severity from string code
     * @param string $stringCode
     * @param bool $throwExceptionsOnUnknownCode
     * @return SeverityInterface
     */
    public static function createFromStringCode($stringCode, $throwExceptionsOnUnknownCode = false)
    {
        $stringCode = strtolower($stringCode);

        switch($stringCode) {
            default:
                if($throwExceptionsOnUnknownCode) {
                    throw new \OutOfBoundsException(sprintf("Unknown severity `%s`", $stringCode));
                }else{
                    return new Unknown($stringCode);
                }

            case SeverityInterface::SEVERITY_INFO: return new Info();
            case SeverityInterface::SEVERITY_ALERT: return new Alert();
            case SeverityInterface::SEVERITY_ERROR: return new Error();
        }
    }
}