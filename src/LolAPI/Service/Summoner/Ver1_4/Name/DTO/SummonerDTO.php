<?php
namespace LolAPI\Service\Summoner\Ver1_4\Name\DTO;

class SummonerDTO
{
    /**
     * Summoner ID
     * @var int
     */
    private $summonerId;

    /**
     * Summoner name
     * @var string
     */
    private $summonerName;

    function __construct($summonerId, $summonerName)
    {
        $this->summonerId = $summonerId;
        $this->summonerName = $summonerName;
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
     * Returns summoner name
     * @return string
     */
    public function getSummonerName()
    {
        return $this->summonerName;
    }
}