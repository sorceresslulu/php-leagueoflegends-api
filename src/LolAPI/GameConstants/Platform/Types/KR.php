<?php
namespace LolAPI\GameConstants\Platform\Types;

use LolAPI\GameConstants\Platform\PlatformInterface;

class KR implements PlatformInterface
{
    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId()
    {
        return self::PLATFORM_KR;
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