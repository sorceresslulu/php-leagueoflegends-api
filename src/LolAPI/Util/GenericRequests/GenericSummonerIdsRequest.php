<?php
namespace LolAPI\Util\GenericRequests;

use LolAPI\APIKey;
use LolAPI\Region\RegionInterface;

class GenericSummonerIdsRequest
{
    const MAX_SUMMONER_IDS_ALLOWED = 40;

    /**
     * APIKey
     * @var APIKey
     */
    private $apiKey;

    /**
     * Region where to retrieve the data.
     * @var \LolAPI\Region\RegionInterface
     */
    private $region;

    /**
     * Summoner Ids
     * Comma-separated list of summoner IDs associated with summoners to retrieve. Maximum allowed at once is 40.
     * @var int[]
     */
    private $summonerIds;

    /**
     * Request
     * @param APIKey $apiKey
     * @param \LolAPI\Region\RegionInterface $region
     * @param array $summonerIds
     */
    function __construct(APIKey $apiKey, RegionInterface $region, array $summonerIds)
    {
        if(count($summonerIds) == 0 || count($summonerIds) >= self::MAX_SUMMONER_IDS_ALLOWED) {
            throw new \InvalidArgumentException(sprintf("Only 1..%d Id's allowed", self::MAX_SUMMONER_IDS_ALLOWED));
        }

        foreach($summonerIds as $summonerId) {
            if(!(is_int($summonerId)) || $summonerId <= 0) {
                throw new \InvalidArgumentException;
            }
        }

        $this->apiKey = $apiKey;
        $this->region = $region;
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
     * Returns region where to retrieve the data.
     * @return \LolAPI\Region\RegionInterface
     */
    public function getRegion()
    {
        return $this->region;
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