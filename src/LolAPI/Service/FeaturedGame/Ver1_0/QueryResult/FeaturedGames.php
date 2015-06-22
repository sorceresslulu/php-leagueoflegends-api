<?php
namespace LolAPI\Service\FeaturedGame\Ver1_0\QueryResult;

class FeaturedGames
{
    /**
     * The suggested interval to wait before requesting FeaturedGames again
     * @var int
     */
    private $clientRefreshInterval;

    /**
     * The list of featured games
     * @var FeaturedGameInfo[]
     */
    private $gameList = array();

    public function __construct($clientRefreshInterval, array $gameList)
    {
        $this->clientRefreshInterval = $clientRefreshInterval;
        $this->gameList = $gameList;
    }

    /**
     * Returns suggested interval to wait before requesting FeaturedGames again
     * @return int
     */
    public function getClientRefreshInterval()
    {
        return $this->clientRefreshInterval;
    }

    /**
     * Returns list of featured games
     * @return FeaturedGameInfo[]
     */
    public function getGameList()
    {
        return $this->gameList;
    }
}