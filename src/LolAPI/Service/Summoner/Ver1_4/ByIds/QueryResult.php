<?php
namespace LolAPI\Service\Summoner\Ver1_4\ByIds;

use LolAPI\Handler\ResponseInterface;
use \LolAPI\Service\Summoner\Ver1_4\ByIds\QueryResult\SummonerDTO;

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
     * @param ResponseInterface $rawResponse
     * @param SummonerDTO[] $summonerDTOs
     */
    public function __construct(ResponseInterface $rawResponse, array $summonerDTOs) {
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
     * @return SummonerDTO[]
     */
    public function getSummonerDTOs() {
        return $this->summonerDTOs;
    }
}

