<?php
namespace LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder;

class TeamMemberInfoDTO
{
    /**
     * Date that team member was invited to team specified as epoch milliseconds.
     * @var int
     */
    private $inviteDate;

    /**
     * Date that team member joined team specified as epoch milliseconds.
     * @var int
     */
    private $joinDate;

    /**
     * Player ID
     * @var int
     */
    private $playerId;

    /**
     * Status
     * @var string
     */
    private $status;

    public function __construct($inviteDate, $joinDate, $playerId, $status)
    {
        $this->inviteDate = $inviteDate;
        $this->joinDate = $joinDate;
        $this->playerId = $playerId;
        $this->status = $status;
    }

    /**
     * Returns date that team member was invited to team specified as epoch milliseconds.
     * @return int
     */
    public function getInviteDate()
    {
        return $this->inviteDate;
    }

    /**
     * Returns date that team member joined team specified as epoch milliseconds.
     * @return int
     */
    public function getJoinDate()
    {
        return $this->joinDate;
    }

    /**
     * Returns player ID
     * @return int
     */
    public function getPlayerId()
    {
        return $this->playerId;
    }

    /**
     * Returns status
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}