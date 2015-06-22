<?php
namespace LolAPI\Service\Summoner\Ver1_4\Masteries;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Summoner\Ver1_4\Masteries\QueryResult\MasteryPagesDTO;

class QueryResult
{
    /**
     * Raw response
     * @var ResponseInterface
     */
    private $rawResponse;

    /**
     * Summoner DTOs
     * @var MasteryPagesDTO[]
     */
    private $masteryPagesDTOs;

    /**
     * Query Result
     * @param $rawResponse
     * @param MasteryPagesDTO[] $masteryPagesDTOs
     */
    public function __construct($rawResponse, array $masteryPagesDTOs)
    {
        $this->rawResponse = $rawResponse;
        $this->masteryPagesDTOs = $masteryPagesDTOs;
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
     * Returns mastery pages DTOs
     * @return QueryResult\MasteryPagesDTO[]
     */
    public function getMasteryPagesDTOs()
    {
        return $this->masteryPagesDTOs;
    }
}

