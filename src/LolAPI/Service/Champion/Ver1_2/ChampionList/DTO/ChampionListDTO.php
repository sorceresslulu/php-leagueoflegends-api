<?php
namespace LolAPI\Service\Champion\Ver1_2\ChampionList\DTO;

use LolAPI\Service\Champion\Ver1_2\ChampionList\DTO\ChampionDTO;

class ChampionListDTO
{
    /**
     * Champion DTOs
     * @var ChampionDTO[]
     */
    private $championDTOs = array();

    /**
     * ChampionList DTO
     * @param $championDTOs
     */
    public function __construct($championDTOs)
    {
        $this->championDTOs = $championDTOs;
    }

    /**
     * Returns champion DTOs
     * @return ChampionDTO[]
     */
    public function getChampionDTOs()
    {
        return $this->championDTOs;
    }
}