<?php
namespace LolAPI\Service\Summoner\Ver1_4\ByNames;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Summoner\Ver1_4\ByNames\QueryResult\SummonerDTO;

class QueryResult
{
    /**
     * Raw response
     * @var ResponseInterface
     */
    private $rawResponse;

    /**
     * Summoner DTOs
     * @var SummonerDTO[]
     */
    private $summonerDTOs = array();

    /**
     * Query Result
     * @param $rawResponse
     * @param SummonerDTO[] $summonerDTOs
     */
    function __construct($rawResponse, array $summonerDTOs)
    {
        $this->rawResponse = $rawResponse;
        $this->summonerDTOs = $summonerDTOs;
    }

    /**
     * Returns raw response
     * @return ResponseInterface
     */
    public function getRawResponse()
    {
        return $this->rawResponse;
    }

    /**
     * Returns summoner DTOs
     * @return QueryResult\SummonerDTO[]
     */
    public function getSummonerDTOs()
    {
        return $this->summonerDTOs;
    }
}

