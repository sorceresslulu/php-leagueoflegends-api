<?php
namespace LolAPI\Service\Game\Ver1_3\Recent\QueryResult;

use LolAPI\GameConstants\GameMode\GameModeInterface;
use LolAPI\GameConstants\GameType\GameTypeInterface;
use LolAPI\GameConstants\MapId\MapIdInterface;
use LolAPI\GameConstants\SubType\SubTypeInterface;
use LolAPI\GameConstants\TeamSide\TeamSideInterface;

class GameDTO
{
    /**
     * Champion ID associated with game
     * @var int
     */
    private $championId;

    /**
     * Date that end game data was recorded, specified as epoch milliseconds
     * @var int
     */
    private $createDate;

    /**
     * Other players associated with the game
     * @var PlayerDTO[]
     */
    private $fellowPlayers;

    /**
     * Game ID
     * @var int
     */
    private $gameId;

    /**
     * Game mode
     * @var GameModeInterface
     */
    private $gameMode;

    /**
     * Game type
     * @var GameTypeInterface
     */
    private $gameType;


    /**
     * Game sub-type
     * @var SubTypeInterface
     */
    private $subType;

    /**
     * Map ID
     * @var MapIdInterface
     */
    private $mapId;


    /**
     * Returns team side
     * @var TeamSideInterface
     */
    private $side;

    /**
     * Invalid flag
     * @var bool
     */
    private $invalid;

    /**
     * IP Earned.
     * @var int
     */
    private $ipEarned;

    /**
     * Level
     * @var int
     */
    private $level;

    /**
     * ID of first summoner spell.
     * @var int
     */
    private $spell1;

    /**
     * ID of second summoner spell.
     * @var int
     */
    private $spell2;

    /**
     * Statistics associated with the game for this summoner
     * @var RawStatsDTO
     */
    private $stats;

    public function __construct(
        $championId,
        $createDate,
        array $fellowPlayers,
        $gameId,
        GameModeInterface $gameMode,
        GameTypeInterface$gameType,
        SubTypeInterface $subType,
        MapIdInterface $mapId,
        TeamSideInterface $side,
        $invalid,
        $ipEarned,
        $level,
        $spell1,
        $spell2,
        RawStatsDTO $stats)
    {
        $this->championId = $championId;
        $this->createDate = $createDate;
        $this->fellowPlayers = $fellowPlayers;
        $this->gameId = $gameId;
        $this->gameMode = $gameMode;
        $this->gameType = $gameType;
        $this->subType = $subType;
        $this->mapId = $mapId;
        $this->side = $side;
        $this->invalid = $invalid;
        $this->ipEarned = $ipEarned;
        $this->level = $level;
        $this->spell1 = $spell1;
        $this->spell2 = $spell2;
        $this->stats = $stats;
    }

    /**
     * Returns champion ID associated with game
     * @return int
     */
    public function getChampionId()
    {
        return $this->championId;
    }

    /**
     * Returns date that end game data was recorded, specified as epoch milliseconds
     * @return int
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Returns list of other players associated with the game
     * @return PlayerDTO[]
     */
    public function getFellowPlayers()
    {
        return $this->fellowPlayers;
    }

    /**
     * Returns true if game has fellow players
     * @return bool
     */
    public function hasFellowPlayers()
    {
        return count($this->fellowPlayers) > 0;
    }

    /**
     * Returns game ID
     * @return int
     */
    public function getGameId()
    {
        return $this->gameId;
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
     * Returns game sub-type
     * @return SubTypeInterface
     */
    public function getSubType()
    {
        return $this->subType;
    }

    /**
     * Returns map ID
     * @return MapIdInterface
     */
    public function getMapId()
    {
        return $this->mapId;
    }

    /**
     * Returns team side
     * @return TeamSideInterface
     */
    public function getSide()
    {
        return $this->side;
    }

    /**
     * Returns team ID associated with game
     * Team ID 100 is blue team
     * Team ID 200 is purple team
     *
     * This constants described as object, don't hardcode these magic numbers!
     *
     * @see TeamSideInterface
     * @see GameDTO::getSide()
     * @return int
     */
    public function getTeamId()
    {
        return $this->getSide()->getId();
    }

    /**
     * Returns "Invalid" flag
     * @return boolean
     */
    public function isInvalid()
    {
        return $this->invalid;
    }

    /**
     * Returns IP Earned
     * @return int
     */
    public function getIpEarned()
    {
        return $this->ipEarned;
    }

    /**
     * Returns level
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Returns ID of first summoner spell
     * @return int
     */
    public function getSpell1()
    {
        return $this->spell1;
    }

    /**
     * Returns ID of second summoner spell
     * @return int
     */
    public function getSpell2()
    {
        return $this->spell2;
    }

    /**
     * Returns tatistics associated with the game for this summoner
     * @return RawStatsDTO
     */
    public function getStats()
    {
        return $this->stats;
    }
}