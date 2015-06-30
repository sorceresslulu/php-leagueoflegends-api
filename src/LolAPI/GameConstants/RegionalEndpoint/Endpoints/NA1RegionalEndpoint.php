<?php
namespace LolAPI\GameConstants\RegionalEndpoint\Endpoints;

class NA1RegionalEndpoint extends AbstractRegionalEndpoint
{
    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId()
    {
        return 'NA1';
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
        return 'NA';
    }

    /**
     * Returns host
     * @return string
     */
    public function getHost()
    {
        return 'na.api.pvp.net';
    }
}