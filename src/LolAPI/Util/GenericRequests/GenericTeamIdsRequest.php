<?php
namespace LolAPI\Util\GenericRequests;

use LolAPI\APIKey;
use LolAPI\Region\RegionInterface;

class GenericTeamIdsRequest
{
    /**
     * API Keys
     * @var APIKey
     */
    private $apiKey;

    /**
     * Region
     * @var RegionInterface
     */
    private $region;

    /**
     * Team IDs
     * @var string[]
     */
    private $teamIds = array();

    /**
     * Request
     * @param APIKey $apiKey
     * @param RegionInterface $region
     * @param string[] $teamIds
     */
    public function __construct(APIKey $apiKey, RegionInterface $region, array $teamIds)
    {
        $this->apiKey = $apiKey;
        $this->region = $region;
        $this->teamIds = $teamIds;
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
     * Returns team IDs
     * @return \string[]
     */
    public function getTeamIds()
    {
        return $this->teamIds;
    }
}