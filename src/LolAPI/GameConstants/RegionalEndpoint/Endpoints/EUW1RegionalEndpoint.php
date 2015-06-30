<?php
namespace LolAPI\GameConstants\RegionalEndpoints\Endpoints;

class EUW1RegionalEndpoint extends AbstractRegionalEndpoint
{
    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId()
    {
        return 'EUW1';
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
        return 'EUW';
    }

    /**
     * Returns host
     * @return string
     */
    public function getHost()
    {
        return 'euw.api.pvp.net';
    }
}