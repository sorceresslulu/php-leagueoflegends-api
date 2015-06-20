<?php
namespace LolAPI\Component\Request;

use LolAPI\APIKey;
use LolAPI\Region;

class GenericSummonerNamesRequest
{
    const MAX_SUMMONER_NAMES_ALLOWED = 40;

    /**
     * APIKey
     * @var APIKey
     */
    private $apiKey;

    /**
     * Region
     * @var Region
     */
    private $region;

    /**
     * Summoner names
     * List of summoner names or standardized summoner names associated with summoners to retrieve. Maximum allowed at once is 40.
     * @var string[]
     */
    private $summonerNames = array();

    /**
     * Request
     * @param APIKey $apiKey
     * @param Region $region
     * @param string[] $summonerNames
     */
    public function __construct(APIKey $apiKey, Region $region, array $summonerNames)
    {
        if(count($summonerNames) == 0 || count($summonerNames) >= self::MAX_SUMMONER_NAMES_ALLOWED) {
            throw new \InvalidArgumentException(sprintf("Only 1..%d names allowed", self::MAX_SUMMONER_NAMES_ALLOWED));
        }

        foreach($summonerNames as $summonerName) {
            if(!(is_string($summonerName)) || strlen($summonerName) == 0 || strlen($summonerName) >= 30) {
                throw new \InvalidArgumentException;
            }
        }

        $this->apiKey = $apiKey;
        $this->summonerNames = $summonerNames;
        $this->region = $region;
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
     * Returns requested summoner names
     * @return string[]
     */
    public function getSummonerNames()
    {
        return $this->summonerNames;
    }
}