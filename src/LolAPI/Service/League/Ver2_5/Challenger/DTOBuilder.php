<?php
namespace LolAPI\Service\League\Ver2_5\Challenger;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\League\Ver2_5\Challenger\DTO\ChallengerDTO;
use LolAPI\Service\League\Ver2_5\Component\LeagueDTOBuilder;

class DTOBuilder
{
    /**
     * LeagueDTO builder
     * @var LeagueDTOBuilder
     */
    private $leagueDTOBuilder;

    /**
     * League.ByTeamIds DTO builder
     * @param $leagueDTOBuilder
     */
    public function __construct($leagueDTOBuilder)
    {
        $this->leagueDTOBuilder = $leagueDTOBuilder;
    }

    /**
     * Builds and returns League.Challenger DTO
     * @param ResponseInterface $response
     * @return ChallengerDTO
     */
    public function builderDTO(ResponseInterface $response)
    {
        $leagueDTO = $this->getLeagueDTOBuilder()->buildLeagueDTO($response->parse());

        return new ChallengerDTO($response, $leagueDTO->getQueue(), $leagueDTO);
    }

    /**
     * Returns leagueDTO builder
     * @return LeagueDTOBuilder
     */
    public function getLeagueDTOBuilder()
    {
        return $this->leagueDTOBuilder;
    }
}