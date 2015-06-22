<?php
namespace LolAPI\Service\Stats\Ver1_3\Summary;

use LolAPI\APIKey;
use LolAPI\Region;

class Request
{
    /**
     * API key
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
     * Season
     * @var null|string
     */
    private $season;

    /**
     * Request
     * @param APIKey $apiKey
     * @param Region $region
     * @param $summonerId
     */
    public function __construct(APIKey $apiKey, Region $region, $summonerId)
    {
        $this->apiKey = $apiKey;
        $this->region = $region;
        $this->summonerId = $summonerId;
    }

    /**
     * Specify season to search stats in
     * @param $season
     */
    public function specifySeason($season)
    {
        $this->season = $season;
    }

    /**
     * Returns true if season specified
     * @return bool
     */
    public function isSeasonSpecified()
    {
        return $this->season !== null;
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
     * Returns season
     * @return null|string
     */
    public function getSeason()
    {
        return $this->season;
    }
}