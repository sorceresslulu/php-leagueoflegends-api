<?php
namespace LolAPI\Service\Team\Ver2_4\ByTeamIds;

use LolAPI\GameConstants\GameMode\GameModeFactoryInterface;
use LolAPI\GameConstants\MapId\MapIdFactoryInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Team\Ver2_4\ByTeamIds\DTO\ByTeamIdsDTO;
use LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder;

class DTOBuilder
{
    /**
     * GameMode Factory
     * @var GameModeFactoryInterface
     */
    private $gameModeFactory;

    /**
     * MapId Factory
     * @var MapIdFactoryInterface
     */
    private $mapIdFactory;

    /**
     * Team.ByTeamIds DTO builder
     * @param GameModeFactoryInterface $gameModeFactory
     * @param $mapIdFactory
     */
    public function __construct(GameModeFactoryInterface $gameModeFactory, MapIdFactoryInterface $mapIdFactory)
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
     * @return GameModeFactoryInterface
     */
    protected function getGameModeFactory()
    {
        return $this->gameModeFactory;
    }

    /**
     * Returns MapId Factory
     * @return MapIdFactoryInterface
     */
    protected function getMapIdFactory()
    {
        return $this->mapIdFactory;
    }
}