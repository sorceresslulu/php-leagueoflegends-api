<?php
namespace LolAPI\Service\Summoner\Ver1_4\ByIds;

use LolAPI\Handler\ResponseInterface;

class QueryResult
{
    /**
     * Raw response
     * @var ResponseInterface
     */
    private $rawResponse;

    /**
     * @var \LolAPI\Service\Summoner\Ver1_4\ByIds\QueryResult\SummonerDTO[]
     */
    private $summonerDTOs = array();

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
     * @return \LolAPI\Service\Summoner\Ver1_4\ByIds\QueryResult\SummonerDTO[]
     */
    public function getSummonerDTOs() {
        return $this->summonerDTOs;
    }
}

