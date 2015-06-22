<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Status;

class StatusFactory
{
    /**
     * Create and returns status from string code
     * @param string $code
     * @return StatusInterface
     * @throws \Exception
     */
    public static function createFromCode($code) {
        $code = strtolower($code);

        switch($code) {
            default:
                throw new \Exception(sprintf("Unknown status `%s`", $code));

            case 'alert': return new AlertStatus();
            case 'deploying': return new DeployingStatus();
            case 'offline': return new OfflineStatus();
            case 'online': return new OnlineStatus();
        }
    }
}