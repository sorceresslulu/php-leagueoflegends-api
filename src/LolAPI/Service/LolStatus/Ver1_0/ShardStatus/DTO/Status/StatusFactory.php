<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Status;

use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Status\Statuses\Alert;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Status\Statuses\Deploying;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Status\Statuses\Offline;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Status\Statuses\Online;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Status\Statuses\Unknown;

class StatusFactory
{
    /**
     * Create and returns status from string code
     * @param string $stringCode
     * @param bool $throwExceptionsOnUnknownCode
     * @return StatusInterface
     */
    public static function createFromStringCode($stringCode, $throwExceptionsOnUnknownCode = false) {
        $stringCode = strtolower($stringCode);

        switch($stringCode) {
            default:
                if($throwExceptionsOnUnknownCode) {
                    throw new \OutOfBoundsException(sprintf("Unknown status `%s`", $stringCode));
                }else{
                    return new Unknown($stringCode);
                }

            case StatusInterface::STATUS_ONLINE: return new Online();
            case StatusInterface::STATUS_ALERT: return new Alert();
            case StatusInterface::STATUS_DEPLOYING: return new Deploying();
            case StatusInterface::STATUS_OFFLINE: return new Offline();
        }
    }
}