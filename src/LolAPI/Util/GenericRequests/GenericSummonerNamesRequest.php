<?php
namespace LolAPI\Util\GenericRequests;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;

class GenericSummonerNamesRequest
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
     * Summoner names
     * List of summoner names or standardized summoner names associated with summoners to retrieve. Maximum allowed at once is 40.
     * @var string[]
     */
    private $summonerNames = array();

    /**
     * Generic request with api_key, regional endpoint and summoner names
     * @param APIKey $apiKey
     * @param RegionalEndpointInterface $regionalEndpoint
     * @param array $summonerNames
     */
    public function __construct(APIKey $apiKey, RegionalEndpointInterface $regionalEndpoint, array $summonerNames)
    {
        $this->apiKey = $apiKey;
        $this->regionalEndpoint = $regionalEndpoint;
        $this->summonerNames = $summonerNames;
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

    /**
     * Returns requested summoner names
     * @return string[]
     */
    public function getSummonerNames()
    {
        return $this->summonerNames;
    }
}