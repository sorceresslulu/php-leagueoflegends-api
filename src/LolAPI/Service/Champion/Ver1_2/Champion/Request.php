<?php
namespace LolAPI\Service\Champion\Ver1_2\Champion;

use LolAPI\APIKey;
use LolAPI\Region;

class Request
{
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
     * Champion ID
     * @var int
     */
    private $championId;

    public function __construct(APIKey $apiKey, Region $region, $championId)
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
     * @return Region
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