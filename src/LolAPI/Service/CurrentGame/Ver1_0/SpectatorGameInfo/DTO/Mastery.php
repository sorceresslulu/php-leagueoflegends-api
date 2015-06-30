<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\DTO;

class Mastery
{
    /**
     * The ID of the mastery
     * @var int
     */
    private $masteryId;

    /**
     * The number of points put into this mastery by the user
     * @var int
     */
    private $rank;

    public function __construct($masteryId, $rank)
    {
        $this->masteryId = $masteryId;
        $this->rank = $rank;
    }

    /**
     * Returns ID of the mastery
     * @return int
     */
    public function getMasteryId()
    {
        return $this->masteryId;
    }

    /**
     * Returns number of points put into this mastery by the user
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }
}