<?php
namespace LolAPI\Service\Game\Ver1_3\Recent;

use LolAPI\APIKey;
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
     * Request
     * @param APIKey $apiKey
     * @param RegionInterface $region
     * @param int $summonerId
     */
    public function __construct(APIKey $apiKey, RegionInterface $region, $summonerId)
    {
        $this->apiKey = $apiKey;
        $this->region = $region;
        $this->summonerId = $summonerId;
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
}