<?php
namespace LolAPI\Service\Stats\Ver1_3\BySummoner;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Stats\Ver1_3\BySummoner\QueryResult\RankedStatsDto;

class QueryResult
{
    /**
     * Raw response
     * @var ResponseInterface
     */
    private $rawResponse;

    /**
     * Ranked Stats DTO
     * @var RankedStatsDto
     */
    private $rankedStatsDTO;

    /**
     * Query Result
     * @param ResponseInterface $rawResponse
     * @param RankedStatsDto $rankedStatsDTO
     */
    public function __construct(ResponseInterface $rawResponse, RankedStatsDto $rankedStatsDTO)
    {
        $this->rawResponse = $rawResponse;
        $this->rankedStatsDTO = $rankedStatsDTO;
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
     * Returns ranked stats DTO
     * @return RankedStatsDto
     */
    public function getRankedStatsDTO()
    {
        return $this->rankedStatsDTO;
    }
}