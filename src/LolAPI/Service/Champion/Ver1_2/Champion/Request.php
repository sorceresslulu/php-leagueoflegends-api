<?php
namespace LolAPI\Service\Champion\Ver1_2\Champion;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;

class Request
{
    /**
     * APIKey
     * @var APIKey
     */
    private $apiKey;

    /**
     * Regional endpoint
     * @var RegionalEndpointInterface
     */
    private $regionalEndpoint;

    /**
     * Champion ID
     * @var int
     */
    private $championId;

    /**
     * Champion.Champion request
     * @param APIKey $apiKey
     * @param RegionalEndpointInterface $regionalEndpoint
     * @param int $championId
     */
    public function __construct(APIKey $apiKey, RegionalEndpointInterface $regionalEndpoint, $championId)
    {
        $this->apiKey = $apiKey;
        $this->regionalEndpoint = $regionalEndpoint;
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
     * Returns regional endpoint
     * @return RegionalEndpointInterface
     */
    public function getRegionalEndpoint()
    {
        return $this->regionalEndpoint;
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