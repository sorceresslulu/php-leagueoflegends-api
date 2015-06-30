<?php
namespace LolAPI\GameConstants\RegionalEndpoints\Endpoints;

class OC1RegionalEndpoint extends AbstractRegionalEndpoint
{
    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId()
    {
        return 'OC1';
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
     */
    public function getRegionCode()
    {
        return 'OCE';
    }

    /**
     * Returns host
     * @return string
     */
    public function getHost()
    {
        return 'oce.api.pvp.net';
    }
}