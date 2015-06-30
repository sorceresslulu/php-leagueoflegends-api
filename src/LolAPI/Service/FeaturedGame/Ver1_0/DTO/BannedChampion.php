<?php
namespace LolAPI\Service\FeaturedGame\Ver1_0\DTO;

class BannedChampion
{
    /**
     * The ID of the banned champion
     * @var int
     */
    private $championId;

    /**
     * The turn during which the champion was banned
     * @var int
     */
    private $pickTurn;

    /**
     * The ID of the team that banned the champion
     * @var int
     */
    private $teamId;

    public function __construct($championId, $pickTurn, $teamId)
    {
        $this->championId = $championId;
        $this->pickTurn = $pickTurn;
        $this->teamId = $teamId;
    }

    /**
     * Returns ID of the banned champion
     * @return int
     */
    public function getChampionId()
    {
        return $this->championId;
    }

    /**
     * Returns the turn during which the champion was banned
     * @return int
     */
    public function getPickTurn()
    {
        return $this->pickTurn;
    }

    /**
     * Returns ID of the team that banned the champion
     * @return int
     */
    public function getTeamId()
    {
        return $this->teamId;
    }
}