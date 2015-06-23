<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo;

use LolAPI\APIKey;
use LolAPI\Platform;
use LolAPI\Region;

class Request
{
    /**
     * API Key
     * @var APIKey
     */
    private $apiKey;

    /**
     * Region
     * @var Region
     */
    private $region;

    /**
     * Summoner ID
     * @var int
     */
    private $summonerId;

    /**
     * Platform ID
     * @var Platform
     */
    private $platformId;

    public function __construct(APIKey $apiKey, Region $region, $summonerId, Platform $platformId)
    {
        $this->apiKey = $apiKey;
        $this->region = $region;
        $this->summonerId = $summonerId;
        $this->platformId = $platformId;
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
     * Returns region
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Returns summoner ID
     * @return int
     */
    public function getSummonerId()
    {
        return $this->summonerId;
    }

    /**
     * Returns platform ID
     * @return Platform
     */
    public function getPlatformId()
    {
        return $this->platformId;
    }
}