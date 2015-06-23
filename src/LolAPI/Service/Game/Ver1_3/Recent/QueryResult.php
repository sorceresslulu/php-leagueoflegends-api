<?php
namespace LolAPI\Service\Game\Ver1_3\Recent;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Game\Ver1_3\Recent\QueryResult\RecentGamesDTO;

class QueryResult
{
    /**
     * Raw response
     * @var ResponseInterface
     */
    private $rawResponse;

    /**
     * Recent games DTO
     * @var RecentGamesDTO
     */
    private $recentGamesDTO;

    /**
     * Query Result
     * @param ResponseInterface $rawResponse
     * @param RecentGamesDTO $recentGamesDTO
     */
    public function __construct(ResponseInterface $rawResponse, RecentGamesDTO $recentGamesDTO)
    {
        $this->rawResponse = $rawResponse;
        $this->recentGamesDTO = $recentGamesDTO;
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
     * Returns recent games DTO
     * @return RecentGamesDTO
     */
    public function getRecentGamesDTO()
    {
        return $this->recentGamesDTO;
    }
}