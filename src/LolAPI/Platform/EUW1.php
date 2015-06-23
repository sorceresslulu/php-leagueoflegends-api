<?php
namespace LolAPI\Platform;

use LolAPI\Platform;

class EUW1 implements Platform
{
    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId()
    {
        return self::PLATFORM_EUW1;
    }

    /**
     * Returns path part for CurrentGame.SpectatorGameInfo query
     * @return string
     */
    public function getCurrentGamePathParam()
    {
        return $this->getPlatformId();
    }
}