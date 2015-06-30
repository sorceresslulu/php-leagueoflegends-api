<?php
namespace LolAPI\GameConstants\RegionalEndpoints\Endpoints;

class PBE1RegionalEndpoint extends AbstractRegionalEndpoint
{
    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId()
    {
        return 'PBE1';
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
        return 'PBE';
    }

    /**
     * Returns host
     * @return string
     */
    public function getHost()
    {
        return 'pbe.api.pvp.net';
    }
}