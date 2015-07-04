<?php
namespace LolAPI\Service\MatchHistory\Ver2_2\BySummonerId;

use LolAPI\APIKey;
use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface;
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
     * Summoner IDs
     * @var int
     */
    private $summonerId;

    /**
     * List of champion IDs to use for fetching games.
     * @var int[]
     */
    private $championIds;

    /**
     * List of queue types to use for fetching games.
     * Non-ranked queue types will be ignored.
     * @var null|LeagueQueueTypeInterface[]
     */
    private $rankedQueues = null;

    /**
     * The begin index to use for fetching games.
     * @var int
     */
    private $beginIndex;

    /**
     * The end index to use for fetching games.
     * @var int
     */
    private $endIndex;

    /**
     * MatchHistory.BySummonerId request
     * @param APIKey $apiKey
     * @param RegionalEndpointInterface $regionalEndpoint
     * @param $summonerId
     */
    public function __construct(APIKey $apiKey, RegionalEndpointInterface $regionalEndpoint, $summonerId)
    {
        $this->apiKey = $apiKey;
        $this->regionalEndpoint = $regionalEndpoint;
        $this->summonerId = $summonerId;
    }

    /**
     * Specify list of champion IDs to use for fetching games.
     * @param \int[] $championIds
     */
    public function specifyChampionIds($championIds)
    {
        $this->championIds = $championIds;
    }

    /**
     * Returns true if champion ids are specified
     * @return bool
     */
    public function isChampionIdsSpecified()
    {
        return $this->championIds !== null;
    }

    /**
     * Specify List of queue types to use for fetching games
     * @param \LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface[]|null $rankedQueues
     */
    public function specifyRankedQueues($rankedQueues)
    {
        $this->rankedQueues = $rankedQueues;
    }

    /**
     * Returns true if rankedQueues param is specified
     * @return bool
     */
    public function isRankedQueuesSpecified()
    {
        return $this->rankedQueues !== null;
    }

    /**
     * Specify start index to use for fetching games.
     * @param int $beginIndex
     */
    public function specifyBeginIndex($beginIndex)
    {
        $this->beginIndex = $beginIndex;
    }

    /**
     * Returns true if begin index is specified
     * @return bool
     */
    public function isBeginIndexSpecified()
    {
        return $this->beginIndex !== null;
    }

    /**
     * Specify end index to use for fetching games.
     * @param int $endIndex
     */
    public function specifyEndIndex($endIndex)
    {
        $this->endIndex = $endIndex;
    }

    /**
     * Returns true if end index is specified
     * @return bool
     */
    public function isEndIndexIsSpecified()
    {
        return $this->endIndex !== null;
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
     * Returns list of champion IDs to use for fetching games.
     * @return \int[]
     * @throws \Exception
     */
    public function getChampionIds()
    {
        if(!($this->isChampionIdsSpecified())) {
            throw new \Exception();
        }

        return $this->championIds;
    }

    /**
     * Returns list of queue types to use for fetching games.
     * @return \LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface[]|null
     * @throws \Exception
     */
    public function getRankedQueues()
    {
        if(!($this->isRankedQueuesSpecified())) {
            throw new \Exception();
        }

        return $this->rankedQueues;
    }

    /**
     * Returns begin index
     * @return int
     * @throws \Exception
     */
    public function getBeginIndex()
    {
        if(!($this->isBeginIndexSpecified())) {
            throw new \Exception();
        }

        return $this->beginIndex;
    }

    /**
     * Returns end index
     * @return int
     * @throws \Exception
     */
    public function getEndIndex()
    {
        if(!($this->isEndIndexIsSpecified())) {
            throw new \Exception();
        }

        return $this->endIndex;
    }
}