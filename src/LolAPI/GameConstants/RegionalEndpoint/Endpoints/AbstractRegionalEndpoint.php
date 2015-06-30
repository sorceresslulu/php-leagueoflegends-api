<?php
namespace LolAPI\GameConstants\RegionalEndpoint\Endpoints;

use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;

abstract class AbstractRegionalEndpoint implements RegionalEndpointInterface
{
    /**
     * Returns true if regional endpoints are equal
     * @param RegionalEndpointInterface $compareTo
     * @return bool
     */
    public function equals(RegionalEndpointInterface $compareTo) {
        return $compareTo->getRegionCode() === $this->getRegionCode();
    }
}