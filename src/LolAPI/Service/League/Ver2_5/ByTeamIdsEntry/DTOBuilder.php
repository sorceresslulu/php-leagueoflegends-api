<?php
namespace LolAPI\Service\League\Ver2_5\ByTeamIdsEntry;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\League\Ver2_5\ByTeamIdsEntry\DTO\TeamDTO;
use LolAPI\Service\League\Ver2_5\Component\LeagueDTOBuilder;

class DTOBuilder
{
    /**
     * LeagueDTO builder
     * @var LeagueDTOBuilder
     */
    private $leagueDTOBuilder;

    /**
     * League.ByTeamIdsEntry DTO builder
     * @param $leagueDTOBuilder
     */
    public function __construct($leagueDTOBuilder)
    {
        $this->leagueDTOBuilder = $leagueDTOBuilder;
    }

    /**
     * Builds and returns League.ByTeamIdsEntry DTO
     * @param ResponseInterface $response
     * @return TeamDTOs
     * @throws \Exception
     */
    public function builderDTO(ResponseInterface $response)
    {
        $parsedResponse = $response->parse();
        $teamDTOs = array();

        foreach($parsedResponse as $teamId => $jsonLeagues) {
            $leagues = array();

            foreach($jsonLeagues as $jsonLeague) {
                $leagues[] = $this->getLeagueDTOBuilder()->buildLeagueDTO($jsonLeague);
            }

            $teamDTOs[] = new TeamDTO(
                $teamId,
                $leagues
            );
        }

        return new TeamDTOs($teamDTOs);
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