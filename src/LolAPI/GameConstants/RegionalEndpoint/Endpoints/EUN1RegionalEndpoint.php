<?php
namespace LolAPI\GameConstants\RegionalEndpoints\Endpoints;

class EUN1RegionalEndpoint extends AbstractRegionalEndpoint
{
    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId()
    {
        return 'EUN1';
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
        return 'EUNE';
    }

    /**
     * Returns host
     * @return string
     */
    public function getHost()
    {
        return 'eune.api.pvp.net';
    }
}