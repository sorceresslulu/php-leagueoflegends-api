<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\QueryResult;

class CurrentGameParticipant
{
    /**
     * The summoner ID of this participant
     * @var int
     */
    private $summonerId;

    /**
     * The summoner name of this participant
     * @var string
     */
    private $summonerName;

    /**
     * The ID of the profile icon used by this participant
     * @var int
     */
    private $profileIconId;

    /**
     * The team ID of this participant, indicating the participant's team
     * @var int
     */
    private $teamId;

    /**
     * The ID of the champion played by this participant
     * @var int
     */
    private $championId;

    /**
     * Flag indicating whether or not this participant is a bot
     * @var bool
     */
    private $bot;

    /**
     * The ID of the first summoner spell used by this participant
     * @var int
     */
    private $spell1Id;

    /**
     * The ID of the second summoner spell used by this participant
     * @var int
     */
    private $spell2Id;

    /**
     * The masteries used by this participant
     * @var Mastery[]
     */
    private $masteries = array();

    /**
     * The runes used by this participant
     * @var Rune[]
     */
    private $runes = array();

    public function __construct($summonerId, $summonerName, $profileIconId, $teamId, $championId, $bot, $spell1Id, $spell2Id, array $masteries, array $runes)
    {
        $this->summonerId = $summonerId;
        $this->summonerName = $summonerName;
        $this->profileIconId = $profileIconId;
        $this->teamId = $teamId;
        $this->championId = $championId;
        $this->bot = $bot;
        $this->spell1Id = $spell1Id;
        $this->spell2Id = $spell2Id;
        $this->masteries = $masteries;
        $this->runes = $runes;
    }

    /**
     * Returns summoner ID of this participant
     * @return int
     */
    public function getSummonerId()
    {
        return $this->summonerId;
    }

    /**
     * Returns summoner name of this participant
     * @return string
     */
    public function getSummonerName()
    {
        return $this->summonerName;
    }

    /**
     * Returns ID of the profile icon used by this participant
     * @return int
     */
    public function getProfileIconId()
    {
        return $this->profileIconId;
    }

    /**
     * Returns team ID of this participant, indicating the participant's team
     * @return int
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * Returns ID of the champion played by this participant
     * @return int
     */
    public function getChampionId()
    {
        return $this->championId;
    }

    /**
     * Returns true if this participant is a bot
     * @return boolean
     */
    public function isBot()
    {
        return $this->bot;
    }

    /**
     * Returns ID of the first summoner spell used by this participant
     * @return int
     */
    public function getSpell1Id()
    {
        return $this->spell1Id;
    }

    /**
     * Returns ID of the second summoner spell used by this participant
     * @return int
     */
    public function getSpell2Id()
    {
        return $this->spell2Id;
    }

    /**
     * Returns masteries used by this participant
     * @return Mastery[]
     */
    public function getMasteries()
    {
        return $this->masteries;
    }

    /**
     * Returns runes used by this participant
     * @return Rune[]
     */
    public function getRunes()
    {
        return $this->runes;
    }
}