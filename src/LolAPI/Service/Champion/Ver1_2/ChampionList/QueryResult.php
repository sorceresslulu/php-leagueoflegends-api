<?php
namespace LolAPI\Service\Champion\Ver1_2\ChampionList;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Champion\Ver1_2\ChampionList\QueryResult\ChampionDTO;

class QueryResult
{
    /**
     * Raw response
     * @var ResponseInterface
     */
    private $rawResponse;

    /**
     * Champion DTOs
     * @var ChampionDTO[]
     */
    private $championDTOs = array();

    public function __construct(ResponseInterface $rawResponse, array $championDTOs)
    {
        $this->rawResponse = $rawResponse;
        $this->championDTOs = $championDTOs;
    }

    /**
     * Returns response
     * @return ResponseInterface
     */
    public function getRawResponse()
    {
        return $this->rawResponse;
    }

    /**
     * Returns champion DTOs
     * @return \LolAPI\Service\Champion\Ver1_2\ChampionList\QueryResult\ChampionDTO[]
     */
    public function getChampionDTOs()
    {
        return $this->championDTOs;
    }
}
