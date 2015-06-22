<?php
namespace LolAPI\Service\Champion\Ver1_2\ChampionList;

use LolAPI\Service\Champion\Ver1_2\ChampionList\Response\ChampionDTO;

class Response
{
    /**
     * Champion DTOs
     * @var ChampionDTO[]
     */
    private $championDTOs = array();

    function __construct($championDTOs)
    {
        $this->championDTOs = $championDTOs;
    }

    /**
     * Returns champion DTOs
     * @return Response\ChampionDTO[]
     */
    public function getChampionDTOs()
    {
        return $this->championDTOs;
    }
}
