<?php
namespace LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder;

use LolAPI\GameConstants\GameMode\GameModeInterface;
use LolAPI\GameConstants\MapId\MapIdInterface;

class MatchHistorySummaryDTO
{
    /**
     * Game ID
     * @var int
     */
    private $gameId;

    /**
     * Date that match was completed specified as epoch milliseconds
     * @var int
     */
    private $date;

    /**
     * Game Mode
     * @var GameModeInterface
     */
    private $gameMode;

    /**
     * MapId
     * @var MapIdInterface
     */
    private $mapId;

    /**
     * Count of assists
     * @var int
     */
    private $assists;

    /**
     * Count of deaths
     * @var int
     */
    private $deaths;

    /**
     * Count of opposing team kills
     * @var int
     */
    private $opposingTeamKills;

    /**
     * Opposing team name
     * @var string
     */
    private $opposingTeamName;

    /**
     * Is invalid?
     * @var bool
     */
    private $invalid;

    /**
     * Game won?
     * @var bool
     */
    private $win;

    public function __construct($gameId, $date, GameModeInterface $gameMode, MapIdInterface $mapId, $assists, $deaths, $opposingTeamKills, $opposingTeamName, $win, $invalid)
    {
        $this->gameId = $gameId;
        $this->date = $date;
        $this->gameMode = $gameMode;
        $this->mapId = $mapId;
        $this->assists = $assists;
        $this->deaths = $deaths;
        $this->opposingTeamKills = $opposingTeamKills;
        $this->opposingTeamName = $opposingTeamName;
        $this->win = $win;
        $this->invalid = $invalid;
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
     * Returns date that match was completed specified as epoch milliseconds
     * @return int
     */
    public function getDate()
    {
        return $this->date;
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
     * Returns map ID
     * @return MapIdInterface
     */
    public function getMapId()
    {
        return $this->mapId;
    }

    /**
     * Returns count of assists
     * @return int
     */
    public function getAssists()
    {
        return $this->assists;
    }

    /**
     * Returns count of deaths
     * @return int
     */
    public function getDeaths()
    {
        return $this->deaths;
    }

    /**
     * Returns count of opposing team kills
     * @return int
     */
    public function getOpposingTeamKills()
    {
        return $this->opposingTeamKills;
    }

    /**
     * Returns name of opposing team
     * @return string
     */
    public function getOpposingTeamName()
    {
        return $this->opposingTeamName;
    }

    /**
     * Return true if the game was won
     * @return boolean
     */
    public function isWin()
    {
        return $this->win;
    }

    /**
     * Returns true if game marked as invalid
     * @return boolean
     */
    public function isInvalid()
    {
        return $this->invalid;
    }
}