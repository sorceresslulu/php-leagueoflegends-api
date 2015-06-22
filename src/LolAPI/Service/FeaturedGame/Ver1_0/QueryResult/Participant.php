<?php
namespace LolAPI\Service\FeaturedGame\Ver1_0\QueryResult;

class Participant
{
    /**
     * Flag indicating whether or not this participant is a bot
     * @var bool
     */
    private $bot;

    /**
     * The ID of the champion played by this participant
     * @var int
     */
    private $championId;

    /**
     * The ID of the profile icon used by this participant
     * @var int
     */
    private $profileIconId;

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
     * The summoner name of this participant
     * @var string
     */
    private $summonerName;

    /**
     * The team ID of this participant, indicating the participant's team
     * @var int
     */
    private $teamId;

    public function __construct($bot, $championId, $profileIconId, $spell1Id, $spell2Id, $summonerName, $teamId)
    {
        $this->bot = $bot;
        $this->championId = $championId;
        $this->profileIconId = $profileIconId;
        $this->spell1Id = $spell1Id;
        $this->spell2Id = $spell2Id;
        $this->summonerName = $summonerName;
        $this->teamId = $teamId;
    }

    /**
     * Returns flag indicating whether or not this participant is a bot
     * @return boolean
     */
    public function isBot()
    {
        return $this->bot;
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
     * Returns ID of the profile icon used by this participant
     * @return int
     */
    public function getProfileIconId()
    {
        return $this->profileIconId;
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
     * Returns summoner name of this participant
     * @return string
     */
    public function getSummonerName()
    {
        return $this->summonerName;
    }

    /**
     * Returns team ID of this participant, indicating the participant's team
     * @return int
     */
    public function getTeamId()
    {
        return $this->teamId;
    }
}