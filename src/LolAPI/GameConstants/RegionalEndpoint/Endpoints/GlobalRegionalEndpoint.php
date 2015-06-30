<?php
namespace LolAPI\GameConstants\RegionalEndpoints\Endpoints;

class GlobalRegionalEndpoint extends AbstractRegionalEndpoint
{
    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId()
    {
        return 'GLOBAL';
    }

    /**
     * Returns true if endpoint has a specified region code
     * @return string
     */
    public function hasRegionCode()
    {
        return true;
    }

    /**
     * Returns region code
     * @return string
     * @throws \Exception
     */
    public function getRegionCode()
    {
        throw new \Exception("No region code available");
    }

    /**
     * Returns host
     * @return string
     */
    public function getHost()
    {
        return 'global.api.pvp.net';
    }
}