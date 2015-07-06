<?php
namespace LolAPI\GameConstants\Platform;

interface PlatformFactoryInterface
{
    /**
     * Create and returns platform from string code
     * @param $stringCode
     * @param bool $throwExceptionsOnUnknownCode
     * @return PlatformInterface
     */
    public function createFromStringCode($stringCode, $throwExceptionsOnUnknownCode = false);
}