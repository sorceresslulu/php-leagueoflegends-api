<?php
namespace LolAPI\Service\FeaturedGame\Ver1_0\DTO;

use LolAPI\Service\FeaturedGame\Ver1_0\DTO\FeaturedGameInfoDTO;

class FeaturedGames
{
    /**
     * The suggested interval to wait before requesting FeaturedGames again
     * @var int
     */
    private $clientRefreshInterval;

    /**
     * The list of featured games
     * @var FeaturedGameInfoDTO[]
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
     * @return FeaturedGameInfoDTO[]
     */
    public function getGameList()
    {
        return $this->gameList;
    }
}