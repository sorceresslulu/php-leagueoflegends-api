<?php
namespace LolAPI\Service\League\Ver2_5\Master;

use LolAPI\APIKey;
use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface;
use LolAPI\Region\RegionInterface;

class Request
{
    /**
     * API Key
     * @var APIKey
     */
    private $apiKey;

    /**
     * Region
     * @var RegionInterface
     */
    private $region;

    /**
     * League Queue Type
     * @var LeagueQueueTypeInterface
     */
    private $leagueQueueType;

    /**
     * Request
     * @param APIKey $apiKey
     * @param RegionInterface $region
     * @param LeagueQueueTypeInterface $leagueQueueType
     */
    public function __construct(APIKey $apiKey, RegionInterface $region, LeagueQueueTypeInterface $leagueQueueType)
    {
        $this->apiKey = $apiKey;
        $this->region = $region;
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
     * Returns region
     * @return RegionInterface
     */
    public function getRegion()
    {
        return $this->region;
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