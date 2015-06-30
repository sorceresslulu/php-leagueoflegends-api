<?php
namespace LolAPI\Service\League\Ver2_5\Master;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\League\Ver2_5\Master\DTO\MasterDTO;
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
     * Builds and returns League.Master DTO
     * @param ResponseInterface $response
     * @return MasterDTO
     */
    public function buildDTO(ResponseInterface $response)
    {
        $leagueDTO = $this->getLeagueDTOBuilder()->buildLeagueDTO($response->parse());

        return new MasterDTO($leagueDTO->getQueue(), $leagueDTO);
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