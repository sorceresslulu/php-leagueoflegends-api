<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Severity;

class SeverityFactory
{
    /**
     * Create and returns severity from string code
     * @param string $code
     * @return SeverityInterface
     * @throws \Exception
     */
    public static function createFromCode($code)
    {
        $code = strtolower($code);

        switch($code) {
            default:
                throw new \Exception(sprintf("Unknown severity `%s`", $code));

            case 'info': return new InfoSeverity();
            case 'alert': return new AlertSeverity();
            case 'error': return new ErrorSeverity();
        }
    }
}