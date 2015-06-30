<?php
namespace LolAPI\Service\Team\Ver2_4\BySummonerIds\DTO;

use LolAPI\Service\Team\Ver2_4\BySummonerIds\DTO\SummonerDTO;

class BySummonerIdsDTO
{
    /**
     * Summoner DTOs
     * @var SummonerDTO[]
     */
    private $summonerDTOs = array();

    /**
     * Team.BySummonerIds DTO
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