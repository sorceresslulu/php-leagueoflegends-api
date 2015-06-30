<?php
namespace LolAPI\Service\Summoner\Ver1_4\ByIds\DTO;

class ByIdsDTO
{
    /**
     * Summoner DTOs
     * @var SummonerDTO[]
     */
    private $summonerDTOs = array();

    /**
     * Summoner.ByIds DTO
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