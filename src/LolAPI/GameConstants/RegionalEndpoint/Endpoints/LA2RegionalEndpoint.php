<?php
namespace LolAPI\GameConstants\RegionalEndpoints\Endpoints;

class LA2RegionalEndpoint extends AbstractRegionalEndpoint
{
    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId()
    {
        return 'LA2';
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
        return 'LAS';
    }

    /**
     * Returns host
     * @return string
     */
    public function getHost()
    {
        return 'las.api.pvp.net';
    }
}