<?php
namespace LolAPI\Util\GenericRequests;

use LolAPI\APIKey;
use LolAPI\Region\RegionInterface;

class GenericRegionAndAPIKeyRequest
{
    /**
     * APIKey
     * @var APIKey
     */
    private $apiKey;

    /**
     * Region
     * @var \LolAPI\Region\RegionInterface
     */
    private $region;

    public function __construct(APIKey $apiKey, RegionInterface $region)
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
     * @return \LolAPI\Region\RegionInterface
     */
    public function getRegion()
    {
        return $this->region;
    }
}