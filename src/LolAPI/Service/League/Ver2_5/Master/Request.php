<?php
namespace LolAPI\Service\League\Ver2_5\Master;

use LolAPI\APIKey;
use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;

class Request
{
    /**
     * API Key
     * @var APIKey
     */
    private $apiKey;

    /**
     * Regional endpoint
     * @var RegionalEndpointInterface
     */
    private $regionalEndpoint;

    /**
     * League Queue Type
     * @var LeagueQueueTypeInterface
     */
    private $leagueQueueType;

    /**
     * League.Master request
     * @param APIKey $apiKey
     * @param RegionalEndpointInterface $regionalEndpoint
     * @param LeagueQueueTypeInterface $leagueQueueType
     */
    public function __construct(APIKey $apiKey, RegionalEndpointInterface $regionalEndpoint, LeagueQueueTypeInterface $leagueQueueType)
    {
        $this->apiKey = $apiKey;
        $this->regionalEndpoint = $regionalEndpoint;
        $this->leagueQueueType = $leagueQueueType;
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
     * Returns league queue type
     * @return LeagueQueueTypeInterface
     */
    public function getLeagueQueueType()
    {
        return $this->leagueQueueType;
    }
}