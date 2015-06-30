<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus;

use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;

class Request
{
    /**
     * Regional endpoint
     * @var RegionalEndpointInterface
     */
    private $regionalEndpoint;

    /**
     * LolStatus.ShardStatus request
     * @param RegionalEndpointInterface $regionalEndpoint
     */
    public function __construct(RegionalEndpointInterface $regionalEndpoint)
    {
        $this->regionalEndpoint = $regionalEndpoint;
    }

    /**
     * Returns regional endpoint
     * @return RegionalEndpointInterface
     */
    public function getRegionalEndpoint()
    {
        return $this->regionalEndpoint;
    }
}