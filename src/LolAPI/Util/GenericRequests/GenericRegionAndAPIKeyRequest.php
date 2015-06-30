<?php
namespace LolAPI\Util\GenericRequests;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;

class GenericRegionAndAPIKeyRequest
{
    /**
     * APIKey
     * @var APIKey
     */
    private $apiKey;

    /**
     * Regional endpoint
     * @var RegionalEndpointInterface
     */
    private $regionalEndpoint;

    /**
     * Generic region + api_key request
     * @param APIKey $apiKey
     * @param RegionalEndpointInterface $regionalEndpoint
     */
    public function __construct(APIKey $apiKey, RegionalEndpointInterface $regionalEndpoint)
    {
        $this->apiKey = $apiKey;
        $this->regionalEndpoint = $regionalEndpoint;
    }

    /**
     * Returns API key
     * @return APIKey
     */
    public function getApiKey()
    {
        return $this->apiKey;
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