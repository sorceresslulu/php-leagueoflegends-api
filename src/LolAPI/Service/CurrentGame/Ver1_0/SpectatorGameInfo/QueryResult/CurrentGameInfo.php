<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\QueryResult;

use LolAPI\GameConstants\GameMode\GameModeInterface;
use LolAPI\GameConstants\GameType\GameTypeInterface;
use LolAPI\GameConstants\MapId\MapIdInterface;
use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;
use LolAPI\GameConstants\Platform\PlatformInterface;

class CurrentGameInfo
{
    /**
     * The ID of the game
     * @var int
     */
    private $gameId;

    /**
     * The platform on which the game is being played
     * @var \LolAPI\GameConstants\Platform\PlatformInterface
     */
    private $platform;

    /**
     * The game start time represented in epoch milliseconds
     * @var int
     */
    private $gameStartTime;

    /**
     * The amount of time in seconds that has passed since the game started
     * @var int
     */
    private $gameLength;

    /**
     * The game type
     * @var GameTypeInterface
     */
    private $gameType;

    /**
     * The game mode
     * @var GameModeInterface
     */
    private $gameMode;

    /**
     * The ID of the map
     * @var MapIdInterface
     */
    private $mapId;

    /**
     * The queue type
     * @var MatchmakingQueueInterface
     */
    private $queueType;

    /**
     * The participant information
     * @var CurrentGameParticipant[]
     */
    private $participants = array();

    /**
     * Banned champion information
     * @var BannedChampion[]
     */
    private $bannedChampions;

    /**
     * The observer information
     * Note: RIOT WTF x2: why "observers" when there is only one observer can be here?
     * @var Observer
     */
    private $observers;

    public function __construct(
        $gameId,
        PlatformInterface $platform,
        $gameStartTime,
        $gameLength,
        GameTypeInterface $gameType,
        GameModeInterface $gameMode,
        MapIdInterface $mapId,
        MatchmakingQueueInterface $queueType,
        array $participants,
        array $bannedChampions,
        Observer $observers)
    {
        $this->gameId = $gameId;
        $this->platform = $platform;
        $this->gameStartTime = $gameStartTime;
        $this->gameLength = $gameLength;
        $this->gameType = $gameType;
        $this->gameMode = $gameMode;
        $this->mapId = $mapId;
        $this->queueType = $queueType;
        $this->participants = $participants;
        $this->bannedChampions = $bannedChampions;
        $this->observers = $observers;
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
     * Returns platform on which the game is being played
     * @return \LolAPI\GameConstants\Platform\PlatformInterface
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Returns ID of platform on which the game is being played
     * @return string
     */
    public function getPlatformId()
    {
        return $this->getPlatform()->getPlatformId();
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
     * Returns amount of time in seconds that has passed since the game started
     * @return int
     */
    public function getGameLength()
    {
        return $this->gameLength;
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
     * Returns game mode
     * @return GameModeInterface
     */
    public function getGameMode()
    {
        return $this->gameMode;
    }

    /**
     * Returns the ID of map
     * @return MapIdInterface
     */
    public function getMapId()
    {
        return $this->mapId;
    }

    /**
     * Returns queue type
     * @return MatchmakingQueueInterface
     */
    public function getGameQueueType()
    {
        return $this->queueType;
    }

    /**
     * Returns queue type (gameQueueConfigId)
     * @return MatchmakingQueueInterface
     */
    public function gameQueueConfigId()
    {
        return $this->getGameQueueType()->getGameQueueConfigId();
    }

    /**
     * Returns participant information
     * @return CurrentGameParticipant[]
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * Returns true if game has a participants
     * (I don't think there will be a situation when this method will return false but who knows)
     * @return bool
     */
    public function hasParticipants()
    {
        return count($this->participants) > 0;
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
}