<?php
namespace LolAPI\Service\Game\Ver1_3\Recent\QueryResult;

class RecentGamesDTO
{
    /**
     * Summoner ID
     * @var int
     */
    private $summonerId;

    /**
     * Collection of recent games played (max 10)
     * @var GameDTO[]
    */
    private $games = array();

    public function __construct($summonerId, array $games)
    {
        $this->summonerId = $summonerId;
        $this->games = $games;
    }

    /**
     * Returns summoner ID
     * @return int
     */
    public function getSummonerId()
    {
        return $this->summonerId;
    }

    /**
     * Returns collection of recent games played (max 10)
     * @return GameDTO[]
     */
    public function getGames()
    {
        return $this->games;
    }
}