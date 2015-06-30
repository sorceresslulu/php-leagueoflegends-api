<?php
namespace LolAPI\GameConstants\RegionalEndpoint\Endpoints;

use LolAPI\GameConstants\RegionalEndpoints\Endpoints\AbstractRegionalEndpoint;

class BR1RegionalEndpoint extends AbstractRegionalEndpoint
{
    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId()
    {
        return 'BR1';
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
        return 'BR';
    }

    /**
     * Returns host
     * @return string
     */
    public function getHost()
    {
        return 'br.api.pvp.net';
    }
}