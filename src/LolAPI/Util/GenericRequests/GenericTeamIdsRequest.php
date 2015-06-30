<?php
namespace LolAPI\Util\GenericRequests;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;

class GenericTeamIdsRequest
{
    /**
     * API Keys
     * @var APIKey
     */
    private $apiKey;

    /**
     * Regional endpoint
     * @var RegionalEndpointInterface
     */
    private $regionalEndpoint;

    /**
     * Team IDs
     * @var string[]
     */
    private $teamIds = array();

    /**
     * Generic request with regional endpoint, api_key and team IDs
     * @param APIKey $apiKey
     * @param RegionalEndpointInterface $regionalEndpoint
     * @param array $teamIds
     */
    public function __construct(APIKey $apiKey, RegionalEndpointInterface $regionalEndpoint, array $teamIds)
    {
        $this->apiKey = $apiKey;
        $this->regionalEndpoint = $regionalEndpoint;
        $this->teamIds = $teamIds;
    }

    /**
     * Returns API Key
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

    /**
     * Returns team IDs
     * @return \string[]
     */
    public function getTeamIds()
    {
        return $this->teamIds;
    }
}