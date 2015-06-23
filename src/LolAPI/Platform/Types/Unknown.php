<?php
namespace LolAPI\Platform\Types;

use LolAPI\Platform\PlatformInterface;

class Unknown implements PlatformInterface
{
    /**
     * Platform Id
     * @var string
     */
    private $platformId;

    /**
     * Special case - unknown platform
     * @param $platformId
     */
    public function __construct($platformId)
    {
        $this->platformId = $platformId;
    }

    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId()
    {
        return $this->platformId;
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