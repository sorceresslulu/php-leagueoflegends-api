<?php
namespace LolAPI\Service\Team\Ver2_4\BySummonerIds\QueryResult;

class TeamStatDetailDTO
{
    /**
     * Team Stat Type
     * @var string
     */
    private $teamStatType;

    /**
     * Average games played
     * @var int
     */
    private $averageGamesPlayed;

    /**
     * Wins
     * @var int
     */
    private $wins;

    /**
     * Losses
     * @var int
     */
    private $losses;

    public function __construct($teamStatType, $averageGamesPlayed, $wins, $losses)
    {
        $this->teamStatType = $teamStatType;
        $this->averageGamesPlayed = $averageGamesPlayed;
        $this->wins = $wins;
        $this->losses = $losses;
    }

    /**
     * Returns team stat type
     * @return string
     */
    public function getTeamStatType()
    {
        return $this->teamStatType;
    }

    /**
     * Returns average games played
     * @return int
     */
    public function getAverageGamesPlayed()
    {
        return $this->averageGamesPlayed;
    }

    /**
     * Returns count of wins
     * @return int
     */
    public function getWins()
    {
        return $this->wins;
    }

    /**
     * Returns count of losses
     * @return int
     */
    public function getLosses()
    {
        return $this->losses;
    }
}