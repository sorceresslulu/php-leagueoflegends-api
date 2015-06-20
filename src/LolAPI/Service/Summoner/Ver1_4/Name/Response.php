<?php
namespace LolAPI\Service\Summoner\Ver1_4\Name;

class Response
{
    /**
     * Summoner DTOs
     * @var \LolAPI\Service\Summoner\Ver1_4\Name\Response\SummonerDTO[]
     */
    private $summonerDTOs;

    function __construct($summonerDTOs)
    {
        $this->summonerDTOs = $summonerDTOs;
    }

    /**
     * Returns summoner DTOs
     * @return \LolAPI\Service\Summoner\Ver1_4\Name\Response\SummonerDTO[]
     */
    public function getSummonerDTOs()
    {
        return $this->summonerDTOs;
    }
}