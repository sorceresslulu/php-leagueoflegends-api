<?php
namespace LolAPI\Service\League\Ver2_5\Challenger;

use LolAPI\Handler\LolAPIResponseInterface;
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
     * @param LolAPIResponseInterface $response
     * @return ChallengerDTO
     */
    public function buildDTO(LolAPIResponseInterface $response)
    {
        $leagueDTO = $this->getLeagueDTOBuilder()->buildLeagueDTO($response->parse());

        return new ChallengerDTO($leagueDTO->getQueue(), $leagueDTO);
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