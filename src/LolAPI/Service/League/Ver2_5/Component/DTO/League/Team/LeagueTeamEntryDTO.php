<?php
namespace LolAPI\Service\League\Ver2_5\Component\DTO\League\Team;

use LolAPI\Service\League\Ver2_5\Component\DTO\League\MiniSeriesDTO;

class LeagueTeamEntryDTO
{
    /**
     * The league division of the participant
     * @var string
     */
    private $division;

    /**
     * Specifies if the participant is fresh blood
     * @var bool
     */
    private $isFreshBlood;

    /**
     * Specifies if the participant is on a hot streak
     * @var bool
     */
    private $isHotStreak;

    /**
     * Specifies if the participant is inactive
     * @var bool
     */
    private $isInactive;

    /**
     * Specifies if the participant is a veteran
     * @var bool
     */
    private $isVeteran;

    /**
     * The league points of the participant.
     * @var string
     */
    private $leaguePoints;

    /**
     * The number of wins for the participant.
     * @var string
     */
    private $wins;

    /**
     * The number of losses for the participant
     * @var string
     */
    private $losses;

    /**
     * Mini series data for the participant. Only present if the participant is currently in a mini series.
     * @var MiniSeriesDTO|null
     */
    private $miniSeries;

    /**
     * The ID of the participant (i.e., summoner or team) represented by this entry.
     * @var string
     */
    private $teamId;

    /**
     * The name of the the participant (i.e., summoner or team) represented by this entry.
     * @var string
     */
    private $teamName;

    public function __construct(
        $division,
        $isFreshBlood,
        $isHotStreak,
        $isInactive,
        $isVeteran,
        $leaguePoints,
        $wins,
        $losses,
        $miniSeries,
        $teamId,
        $teamName)
    {
        $this->division = $division;
        $this->isFreshBlood = $isFreshBlood;
        $this->isHotStreak = $isHotStreak;
        $this->isInactive = $isInactive;
        $this->isVeteran = $isVeteran;
        $this->leaguePoints = $leaguePoints;
        $this->wins = $wins;
        $this->losses = $losses;
        $this->miniSeries = $miniSeries;
        $this->teamId = $teamId;
        $this->teamName = $teamName;
    }

    /**
     * Returns league division of the participant
     * @return string
     */
    public function getDivision()
    {
        return $this->division;
    }

    /**
     * Returns true if the participant is fresh blood
     * @return boolean
     */
    public function isFreshBlood()
    {
        return $this->isFreshBlood;
    }

    /**
     * Returns true if the participant is on a hot streak
     * @return boolean
     */
    public function isHotStreak()
    {
        return $this->isHotStreak;
    }

    /**
     * Returns true if the participant is inactive
     * @return boolean
     */
    public function isInactive()
    {
        return $this->isInactive;
    }

    /**
     * Returns true if the participant is a veteran
     * @return boolean
     */
    public function isVeteran()
    {
        return $this->isVeteran;
    }

    /**
     * Returns league points of the participant.
     * @return string
     */
    public function getLeaguePoints()
    {
        return $this->leaguePoints;
    }

    /**
     * Returns number of wins for the participant.
     * @return string
     */
    public function getWins()
    {
        return $this->wins;
    }

    /**
     * Returns number of losses for the participant.
     * @return string
     */
    public function getLosses()
    {
        return $this->losses;
    }

    /**
     * Mini series data for the participant.
     * In case if participant has no mini series you'll got an exception!
     * @return MiniSeriesDTO
     * @throws \Exception
     */
    public function getMiniSeries()
    {
        if(!($this->hasMiniSeries())) {
            throw new \Exception('Participant has no mini series');
        }

        return $this->miniSeries;
    }

    /**
     * Returns true if participant has mini series
     * @return bool
     */
    public function hasMiniSeries()
    {
        return $this->miniSeries instanceof MiniSeriesDTO;
    }

    /**
     * Returns ID of the participant (i.e., summoner or team) represented by this entry.
     * @return string
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * Returns name of the participant (i.e., summoner or team) represented by this entry.
     * @return string
     */
    public function getTeamName()
    {
        return $this->teamName;
    }
}