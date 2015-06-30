<?php
namespace LolAPI\Service\League\Ver2_5\BySummonerIds\DTO;

class SummonerDTOs
{
    /**
     * Summoner DTOs
     * @var SummonerDTO[]
     */
    private $summonerDTOs;

    /**
     * Summoner DTOs
     * @param array $summonerDTOs
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