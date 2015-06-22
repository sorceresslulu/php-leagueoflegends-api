<?php
namespace LolAPI\Component\Request;

use LolAPI\APIKey;
use LolAPI\Region;

class GenericRegionAndAPIKeyRequest
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

    public function __construct(APIKey $apiKey, Region $region)
    {
        $this->apiKey = $apiKey;
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
}