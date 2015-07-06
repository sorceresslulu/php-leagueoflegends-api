<?php
namespace LolAPI\Service\League\Ver2_5\ByTeamIds;

use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\League\Ver2_5\ByTeamIds\DTO\TeamDTO;
use LolAPI\Service\League\Ver2_5\ByTeamIds\DTO\TeamDTOs;
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
     * Builds and returns League.ByTeamIds DTO
     * @param LolAPIResponseInterface $response
     * @return TeamDTOs
     * @throws \Exception
     */
    public function buildDTO(LolAPIResponseInterface $response)
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