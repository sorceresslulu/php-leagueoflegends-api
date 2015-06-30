<?php
namespace LolAPI\Util\GenericRequests;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;

class GenericSummonerIdsRequest
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
     * Summoner Ids
     * Comma-separated list of summoner IDs associated with summoners to retrieve. Maximum allowed at once is 40.
     * @var int[]
     */
    private $summonerIds;

    /**
     * Generic request with region, api_key and summoner Id's
     * @param APIKey $apiKey
     * @param RegionalEndpointInterface $regionalEndpoint
     * @param array $summonerIds
     */
    public function __construct(APIKey $apiKey, RegionalEndpointInterface $regionalEndpoint, array $summonerIds)
    {
        $this->apiKey = $apiKey;
        $this->regionalEndpoint = $regionalEndpoint;
        $this->summonerIds = $summonerIds;
    }

    /**
     * Returns APIKey
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
     * Returns requested summoner Id's
     * @return \int[]
     */
    public function getSummonerIds()
    {
        return $this->summonerIds;
    }
}