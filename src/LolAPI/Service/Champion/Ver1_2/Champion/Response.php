<?php
namespace LolAPI\Service\Champion\Ver1_2\Champion;

use LolAPI\Service\Champion\Ver1_2\Champion\Response\ChampionDTO;

class Response
{
    /**
     * Champion DTO
     * @var ChampionDTO
     */
    private $championDTO;

    function __construct($championDTO)
    {
        $this->championDTO = $championDTO;
    }

    /**
     * Returns champion DTO
     * @return ChampionDTO
     */
    public function getChampionDTO()
    {
        return $this->championDTO;
    }
}