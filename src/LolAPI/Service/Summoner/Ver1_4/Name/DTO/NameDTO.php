<?php
namespace LolAPI\Service\Summoner\Ver1_4\Name\DTO;

use LolAPI\Service\Summoner\Ver1_4\Name\DTO\SummonerDTO;

class NameDTO
{
    /**
     * Summoner DTOs
     * @var SummonerDTO[]
     */
    private $summonerDTOs = array();

    /**
     * Summoner.Name DTO
     * @param SummonerDTO[] $summonerDTOs
     */
    public function __construct(array $summonerDTOs)
    {
        $this->summonerDTOs = $summonerDTOs;
    }

    /**
     * Returns summoner DTOs
     * @return SummonerDTO[]
     */
    public function getSummonerDTOs()
    {
        return $this->summonerDTOs;
    }
}