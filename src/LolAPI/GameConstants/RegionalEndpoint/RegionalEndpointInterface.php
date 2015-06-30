<?php
namespace LolAPI\GameConstants\RegionalEndpoint;

interface RegionalEndpointInterface
{
    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId();

    /**
     * Returns region code
     * @return string
     */
    public function getRegionCode();

    /**
     * Returns true if endpoint has a specified region code
     * @return string
     */
    public function hasRegionCode();

    /**
     * Returns host
     * @return string
     */
    public function getHost();

    /**
     * Returns true if regional endpoints are equal
     * @param RegionalEndpointInterface $compareTo
     * @return bool
     */
    public function equals(RegionalEndpointInterface $compareTo);
}