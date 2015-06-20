<?php
namespace LolAPI\Service\Summoner\Ver1_4\Masteries\Response;

class MasteryDTO
{
    /**
     * Mastery ID.
     * For static information correlating to masteries, please refer to the LoL Static Data API.
     * @var int
     */
    private $id;

    /**
     * Mastery rank (i.e., the number of points put into this mastery).
     * @var int
     */
    private $rank;

    function __construct($id, $rank)
    {
        $this->id = $id;
        $this->rank = $rank;
    }

    /**
     * Returns mastery ID.
     * For static information correlating to masteries, please refer to the LoL Static Data API.
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns mastery rank (i.e., the number of points put into this mastery).
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }
}