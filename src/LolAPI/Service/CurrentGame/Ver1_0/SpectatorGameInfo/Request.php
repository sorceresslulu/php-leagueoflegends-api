<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo;

use LolAPI\APIKey;
use LolAPI\GameConstants\Platform\PlatformInterface;
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
     * Summoner ID
     * @var int
     */
    private $summonerId;

    /**
     * Platform ID
     * @var \LolAPI\GameConstants\Platform\PlatformInterface
     */
    private $platformId;

    public function __construct(APIKey $apiKey, RegionInterface $region, $summonerId, PlatformInterface $platformId)
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
     * @return RegionInterface
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
     * @return \LolAPI\GameConstants\Platform\PlatformInterface
     */
    public function getPlatformId()
    {
        return $this->platformId;
    }
}