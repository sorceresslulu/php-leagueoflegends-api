<?php
namespace LolAPI\Service\League\Ver2_5\BySummonerIdsEntry;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\League\Ver2_5\BySummonerIdsEntry\DTO\SummonerDTO;

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
    private $summonerDTOs;

    /**
     * Query Result
     * @param ResponseInterface $rawResponse
     * @param array $summonerDTOs
     */
    public function __construct(ResponseInterface $rawResponse, array $summonerDTOs)
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
     * @return DTO\SummonerDTO[]
     */
    public function getSummonerDTOs()
    {
        return $this->summonerDTOs;
    }
}