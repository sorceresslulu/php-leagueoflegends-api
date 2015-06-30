<?php
namespace LolAPI\GameConstants\RegionalEndpoint;

interface RegionalEndpointFactoryInterface
{
    /**
     * Create and returns regional endpoint by platform Id
     * @param string $sPlatformId
     * @return RegionalEndpointInterface
     */
    public function createFromPlatformId($sPlatformId);
}