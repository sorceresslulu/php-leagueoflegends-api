<?php
namespace LolAPI\GameConstants\RegionalEndpoint\Endpoints;

class KRRegionalEndpoint extends AbstractRegionalEndpoint
{
    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId()
    {
        return 'KR';
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
        return 'KR';
    }

    /**
     * Returns host
     * @return string
     */
    public function getHost()
    {
        return 'kr.api.pvp.net';
    }
}