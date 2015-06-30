<?php
namespace LolAPI\Service\Stats\Ver1_3\Summary;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;
use LolAPI\GameConstants\Season\SeasonInterface;

class Request
{
    /**
     * API key
     * @var APIKey
     */
    private $apiKey;

    /**
     * Regional endpoint
     * @var RegionalEndpointInterface
     */
    private $regionalEndpoint;

    /**
     * Summoner ID
     * @var int
     */
    private $summonerId;

    /**
     * Season
     * @var SeasonInterface|null
     */
    private $season;

    /**
     * Stats.BySummoner request
     * @param APIKey $apiKey
     * @param RegionalEndpointInterface $regionalEndpoint
     * @param int $summonerId
     */
    public function __construct(APIKey $apiKey, RegionalEndpointInterface $regionalEndpoint, $summonerId)
    {
        $this->apiKey = $apiKey;
        $this->regionalEndpoint = $regionalEndpoint;
        $this->summonerId = $summonerId;
    }

    /**
     * Specify season to search stats in
     * @param SeasonInterface $season
     */
    public function specifySeason(SeasonInterface $season)
    {
        $this->season = $season;
    }

    /**
     * Returns true if season specified
     * @return bool
     */
    public function isSeasonSpecified()
    {
        return $this->season !== null;
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
     * Returns summoner ID
     * @return int
     */
    public function getSummonerId()
    {
        return $this->summonerId;
    }

    /**
     * Returns season
     * @return null|SeasonInterface
     */
    public function getSeason()
    {
        return $this->season;
    }
}