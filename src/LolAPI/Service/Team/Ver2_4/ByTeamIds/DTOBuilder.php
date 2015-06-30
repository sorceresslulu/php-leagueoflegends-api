<?php
namespace LolAPI\Service\Team\Ver2_4\ByTeamIds;

use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Team\Ver2_4\ByTeamIds\DTO\ByTeamIdsDTO;
use LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder;

class DTOBuilder
{
    /**
     * GameMode Factory
     * @var GameModeFactory
     */
    private $gameModeFactory;

    /**
     * MapId Factory
     * @var MapIdFactory
     */
    private $mapIdFactory;

    /**
     * Team.ByTeamIds DTO builder
     * @param GameModeFactory $gameModeFactory
     * @param $mapIdFactory
     */
    public function __construct(GameModeFactory $gameModeFactory, MapIdFactory $mapIdFactory)
    {
        $this->gameModeFactory = $gameModeFactory;
        $this->mapIdFactory = $mapIdFactory;
    }

    /**
     * Builds and returns Team.ByTeamIds DTO
     * @param ResponseInterface $response
     * @return ByTeamIdsDTO
     */
    public function buildDTO(ResponseInterface $response)
    {
        $parsedResponse = $response->parse();
        $teamDTOBuilder = new TeamDTOBuilder($this->getGameModeFactory(), $this->getMapIdFactory());
        $teamDTOs = array();

        foreach($parsedResponse as $arrTeam) {
            $teamDTOs[] = $teamDTOBuilder->buildTeamDTO($arrTeam);
        }

        return new ByTeamIdsDTO($teamDTOs);
    }

    /**
     * Returns GameMode factory
     * @return GameModeFactory
     */
    protected function getGameModeFactory()
    {
        return $this->gameModeFactory;
    }

    /**
     * Returns MapId Factory
     * @return MapIdFactory
     */
    protected function getMapIdFactory()
    {
        return $this->mapIdFactory;
    }
}