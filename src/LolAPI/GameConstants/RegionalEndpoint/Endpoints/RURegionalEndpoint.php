<?php
namespace LolAPI\GameConstants\RegionalEndpoint\Endpoints;

class RURegionalEndpoint extends AbstractRegionalEndpoint
{
    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId()
    {
        return 'RU';
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
        return 'RU';
    }

    /**
     * Returns host
     * @return string
     */
    public function getHost()
    {
        return 'ru.api.pvp.net';
    }
}