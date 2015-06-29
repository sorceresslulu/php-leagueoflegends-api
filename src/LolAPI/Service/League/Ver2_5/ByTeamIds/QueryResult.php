<?php
namespace LolAPI\Service\League\Ver2_5\ByTeamIds;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\League\Ver2_5\ByTeamIds\DTO\TeamDTO;

class QueryResult
{
    /**
     * Raw response
     * @var ResponseInterface
     */
    private $rawResponse;

    /**
     * Team DTOs
     * @var TeamDTO[]
     */
    private $teamDTOs = array();

    /**
     * Query Result
     * @param ResponseInterface $rawResponse
     * @param TeamDTO[] $teamDTOs
     */
    public function __construct(ResponseInterface $rawResponse, array $teamDTOs)
    {
        $this->rawResponse = $rawResponse;
        $this->teamDTOs = $teamDTOs;
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
     * Returns team DTOs
     * @return TeamDTO[]
     */
    public function getTeamDTOs()
    {
        return $this->teamDTOs;
    }
}