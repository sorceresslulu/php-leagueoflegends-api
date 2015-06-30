<?php
namespace LolAPI\GameConstants\RegionalEndpoint\Endpoints;

class TR1RegionalEndpoint extends AbstractRegionalEndpoint
{
    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId()
    {
        return 'TR1';
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
        return 'TR';
    }

    /**
     * Returns host
     * @return string
     */
    public function getHost()
    {
        return 'tr.api.pvp.net';
    }
}