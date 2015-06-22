<?php
namespace LolAPI\Service\Champion\Ver1_2\ChampionList;

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
     * Optional filter param to retrieve only free to play champions.
     * @var bool|null
     */
    private $freeToPlay = null;

    function __construct(APIKey $APIKey, Region $region, $freeToPlay = null)
    {
        $this->apiKey = $APIKey;
        $this->freeToPlay = $freeToPlay;
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

    public function fetchFreeToPlayChampionsOnly()
    {
        return $this->freeToPlay === true;
    }

    public function fetchNotFreeToPlayChampionsOnly()
    {
        return $this->freeToPlay === false;
    }

    /**
     * Returns region
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }
}