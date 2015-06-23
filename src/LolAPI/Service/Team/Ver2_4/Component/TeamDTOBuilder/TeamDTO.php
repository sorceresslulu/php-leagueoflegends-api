<?php
namespace LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder;

use LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\MatchHistorySummaryDTO;
use LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\RosterDTO;
use LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\TeamStatDetailDTO;

class TeamDTO
{
    /**
     * Full ID
     * @var string
     */
    private $fullId;

    /**
     * Team name
     * @var string
     */
    private $name;

    /**
     * Status
     * @var string
     */
    private $status;

    /**
     * Tag
     * @var string
     */
    private $tag;

    /**
     * Date that team was created specified as epoch milliseconds.
     * @var int
     */
    private $createDate;

    /**
     * Date that team was last modified specified as epoch milliseconds.
     * @var int
     */
    private $modifyDate;


    /**
     * Date that last game played by team ended specified as epoch milliseconds.
     * @var int
     */
    private $lastGameDate;

    /**
     * Date that last member joined specified as epoch milliseconds.
     * @var int
     */
    private $lastJoinDate;

    /**
     * Date that second to last member joined specified as epoch milliseconds.
     * @var int
     */
    private $secondLastJoinDate;

    /**
     * Date that third to last member joined specified as epoch milliseconds.
     * @var int
     */
    private $thirdLastJoinDate;

    /**
     * Date that team last joined the ranked team queue specified as epoch milliseconds.
     * @var int
     */
    private $lastJoinedRankedTeamQueueDate;

    /**
     * Match History
     * @var MatchHistorySummaryDTO[]
     */
    private $matchHistory = array();

    /**
     * Roster
     * @var RosterDTO
     */
    private $roster;

    /**
     * Team Stats
     * @var TeamStatDetailDTO[]
     */
    private $teamStatDetails = array();

    public function __construct(
        $fullId,
        $name,
        $status,
        $tag,
        $createDate,
        $modifyDate,
        $lastGameDate,
        $lastJoinDate,
        $secondLastJoinDate,
        $thirdLastJoinDate,
        $lastJoinedRankedTeamQueueDate,
        array $matchHistory,
        RosterDTO $roster,
        array $teamStatDetails
    ){
        $this->fullId = $fullId;
        $this->name = $name;
        $this->status = $status;
        $this->tag = $tag;
        $this->createDate = $createDate;
        $this->modifyDate = $modifyDate;
        $this->lastGameDate = $lastGameDate;
        $this->lastJoinDate = $lastJoinDate;
        $this->secondLastJoinDate = $secondLastJoinDate;
        $this->thirdLastJoinDate = $thirdLastJoinDate;
        $this->lastJoinedRankedTeamQueueDate = $lastJoinedRankedTeamQueueDate;
        $this->matchHistory = $matchHistory;
        $this->roster = $roster;
        $this->teamStatDetails = $teamStatDetails;
    }

    /**
     * Returns full ID
     * @return string
     */
    public function getFullId()
    {
        return $this->fullId;
    }

    /**
     * Returns team name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns status
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns tag
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Returns date that team was created specified as epoch milliseconds
     * @return int
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Returns ate that team was created specified as epoch milliseconds
     * @return int
     */
    public function getModifyDate()
    {
        return $this->modifyDate;
    }

    /**
     * Returns date that last game played by team ended specified as epoch milliseconds
     * @return int
     */
    public function getLastGameDate()
    {
        return $this->lastGameDate;
    }

    /**
     * Returns date that last member joined specified as epoch milliseconds.
     * @return int
     */
    public function getLastJoinDate()
    {
        return $this->lastJoinDate;
    }

    /**
     * Returns date that second to last member joined specified as epoch milliseconds.
     * @return int
     */
    public function getSecondLastJoinDate()
    {
        return $this->secondLastJoinDate;
    }

    /**
     * Returns date that third to last member joined specified as epoch milliseconds.
     * @return int
     */
    public function getThirdLastJoinDate()
    {
        return $this->thirdLastJoinDate;
    }

    /**
     * Returns date that team last joined the ranked team queue specified as epoch milliseconds.
     * @return int
     */
    public function getLastJoinedRankedTeamQueueDate()
    {
        return $this->lastJoinedRankedTeamQueueDate;
    }

    /**
     * Returns match history
     * @return \LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\MatchHistorySummaryDTO[]
     */
    public function getMatchHistory()
    {
        return $this->matchHistory;
    }

    /**
     * Returns true if team has match history
     * @return bool
     */
    public function hasMatchHistory()
    {
        return count($this->matchHistory) > 0;
    }

    /**
     * Returns roster
     * @return \LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\RosterDTO
     */
    public function getRoster()
    {
        return $this->roster;
    }

    /**
     * Returns team stats
     * @return TeamStatDetailDTO[]
     */
    public function getTeamStatDetails()
    {
        return $this->teamStatDetails;
    }

    /**
     * Returns true if team has stats
     * @return bool
     */
    public function hasTeamStatsDetails()
    {
        return count($this->teamStatDetails) > 0;
    }
}