<?php
namespace LolAPI\Service\Team\Ver2_4\BySummonerIds\QueryResult;

class RosterDTO
{
    /**
     * Owner ID
     * @var int
     */
    private $ownerId;

    /**
     * Team members list
     * @var TeamMemberInfoDTO[]
     */
    private $memberList = array();

    public function __construct($ownerId, array $memberList)
    {
        $this->ownerId = $ownerId;
        $this->memberList = $memberList;
    }

    /**
     * Returns owner ID
     * @return int
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * Returns team members list
     * @return TeamMemberInfoDTO[]
     */
    public function getMemberList()
    {
        return $this->memberList;
    }

    /**
     * Returns true if roster has members
     * @return bool
     */
    public function hasMembers()
    {
        return count($this->memberList) > 0;
    }
}