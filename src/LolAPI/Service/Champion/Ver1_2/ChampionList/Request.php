<?php
namespace LolAPI\Service\Champion\Ver1_2\ChampionList;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;

class Request
{
    /**
     * API Key
     * @var APIKey
     */
    private $apiKey;

    /**
     * Regional endpoint
     * @var RegionalEndpointInterface
     */
    private $regionalEndpoint;

    /**
     * Optional filter param to retrieve only free to play champions.
     * @var bool|null
     */
    private $freeToPlay = null;

    /**
     * Champion.ChampionList request
     * @param APIKey $apiKey
     * @param RegionalEndpointInterface $regionalEndpoint
     * @param bool|null $freeToPlay
     */
    public function __construct(APIKey $apiKey, RegionalEndpointInterface $regionalEndpoint, $freeToPlay = null)
    {
        $this->apiKey = $apiKey;
        $this->regionalEndpoint = $regionalEndpoint;
        $this->freeToPlay = $freeToPlay;
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
     * Returns true if user specified to fetch only free2play champions
     * @return bool
     */
    public function fetchFreeToPlayChampionsOnly()
    {
        return $this->freeToPlay === true;
    }

    /**
     * Returns true if user specified to fetch only NOT free2play champions
     * @return bool
     */
    public function fetchNotFreeToPlayChampionsOnly()
    {
        return $this->freeToPlay === false;
    }
}