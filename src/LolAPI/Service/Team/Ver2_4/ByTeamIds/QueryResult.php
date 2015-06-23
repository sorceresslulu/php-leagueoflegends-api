<?php
namespace LolAPI\Service\Team\Ver2_4\ByTeamIds;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\TeamDTO;

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
     * @return \LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\TeamDTO[]
     */
    public function getTeamDTOs()
    {
        return $this->teamDTOs;
    }
}