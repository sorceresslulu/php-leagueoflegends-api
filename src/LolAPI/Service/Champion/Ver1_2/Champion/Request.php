<?php
namespace LolAPI\Service\Champion\Ver1_2\Champion;

use LolAPI\APIKey;
use LolAPI\Region\RegionInterface;

class Request
{
    /**
     * APIKey
     * @var APIKey
     */
    private $apiKey;

    /**
     * Region
     * @var RegionInterface
     */
    private $region;

    /**
     * Champion ID
     * @var int
     */
    private $championId;

    public function __construct(APIKey $apiKey, RegionInterface $region, $championId)
    {
        if(!(is_int($championId)) || $championId < 0) {
            throw new \InvalidArgumentException;
        }

        $this->apiKey = $apiKey;
        $this->region = $region;
        $this->championId = $championId;
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
     * @return \LolAPI\Region\RegionInterface
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Returns champion ID
     * @return int
     */
    public function getChampionId()
    {
        return $this->championId;
    }
}