<?php
namespace LolAPI\Service\FeaturedGame\Ver1_0\QueryResult;

use LolAPI\GameConstants\GameMode\GameModeInterface;
use LolAPI\GameConstants\GameType\GameTypeInterface;
use LolAPI\GameConstants\MatchmakingQueue\MatchmakingQueueInterface;

class FeaturedGameInfo
{
    /**
     * The ID of the game
     * @var int
     */
    private $gameId;

    /**
     * The amount of time in seconds that has passed since the game started
     * @var int
     */
    private $gameLength;

    /**
     * The game mode
     * @var GameModeInterface
     */
    private $gameMode;

    /**
     * The game type
     * @var GameTypeInterface
     */
    private $gameType;

    /**
     * The queue type
     * @var MatchmakingQueueInterface
     */
    private $gameQueue;

    /**
     * The game start time represented in epoch milliseconds
     * @var int
     */
    private $gameStartTime;

    /**
     * The ID of the map
     * @var int
     */
    private $mapId;

    /**
     * The ID of the platform on which the game is being played
     * @var string
     */
    private $platformId;

    /**
     * Banned champion information
     * @var BannedChampion[]
     */
    private $bannedChampions;

    /**
     * The observer information
     * Note: RIOT WTF? Why you names this key as "observer" when there is only one observer can be here?
     * @var Observer
     */
    private $observers;

    /**
     * The participant information
     * @var Participant[]
     */
    private $participants;

    function __construct($gameId, $gameLength, $gameMode, GameTypeInterface $gameType, MatchmakingQueueInterface $gameQueue, $gameStartTime, $mapId, $platformId, array $bannedChampions, Observer $observers, array $participants)
    {
        $this->gameId = $gameId;
        $this->gameLength = $gameLength;
        $this->gameMode = $gameMode;
        $this->gameType = $gameType;
        $this->gameQueue = $gameQueue;
        $this->gameStartTime = $gameStartTime;
        $this->mapId = $mapId;
        $this->platformId = $platformId;
        $this->bannedChampions = $bannedChampions;
        $this->observers = $observers;
        $this->participants = $participants;
    }

    /**
     * Returns ID of the game
     * @return int
     */
    public function getGameId()
    {
        return $this->gameId;
    }

    /**
     * Returns amount of time in seconds that has passed since the game started
     * @return int
     */
    public function getGameLength()
    {
        return $this->gameLength;
    }

    /**
     * Returns game mode
     * @return GameModeInterface
     */
    public function getGameMode()
    {
        return $this->gameMode;
    }

    /**
     * Returns game type
     * @return GameTypeInterface
     */
    public function getGameType()
    {
        return $this->gameType;
    }

    /**
     * Returns queue type
     * @return MatchmakingQueueInterface
     */
    public function getGameQueue()
    {
        return $this->gameQueue;
    }

    /**
     * Returns game start time represented in epoch milliseconds
     * @return int
     */
    public function getGameStartTime()
    {
        return $this->gameStartTime;
    }

    /**
     * Returns ID of the map
     * @return int
     */
    public function getMapId()
    {
        return $this->mapId;
    }

    /**
     * Returns ID of the platform on which the game is being played
     * @return string
     */
    public function getPlatformId()
    {
        return $this->platformId;
    }

    /**
     * Returns banned champion information
     * @return BannedChampion[]
     */
    public function getBannedChampions()
    {
        return $this->bannedChampions;
    }

    /**
     * Returns true if game has a list of banned champions
     * @return bool
     */
    public function hasBannedChampions()
    {
        return count($this->bannedChampions) > 0;
    }

    /**
     * Returns observer information
     * @return Observer
     */
    public function getObservers()
    {
        return $this->observers;
    }

    /**
     * Returns participant information
     * @return Participant[]
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * Returns true if game has a list of participants
     * @return bool
     */
    public function hasParticipants()
    {
        return count($this->participants) > 0;
    }
}