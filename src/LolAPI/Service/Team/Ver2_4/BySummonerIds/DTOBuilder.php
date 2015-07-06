<?php
namespace LolAPI\Service\Team\Ver2_4\BySummonerIds;

use LolAPI\GameConstants\GameMode\GameModeFactoryInterface;
use LolAPI\GameConstants\MapId\MapIdFactoryInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Team\Ver2_4\BySummonerIds\DTO\BySummonerIdsDTO;
use LolAPI\Service\Team\Ver2_4\BySummonerIds\DTO\SummonerDTO;
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
     * Team.BySummonerIds DTO builder
     * @param GameModeFactoryInterface $gameModeFactory
     * @param $mapIdFactory
     */
    public function __construct(GameModeFactoryInterface $gameModeFactory, MapIdFactoryInterface $mapIdFactory)
    {
        $this->gameModeFactory = $gameModeFactory;
        $this->mapIdFactory = $mapIdFactory;
    }

    /**
     * Builds and returns Team.BySummonerIds DTO
     * @param ResponseInterface $response
     * @return BySummonerIdsDTO
     */
    public function buildDTO(ResponseInterface $response)
    {
        $parsedResponse = $response->parse();
        $teamDTOBuilder = new TeamDTOBuilder($this->getGameModeFactory(), $this->getMapIdFactory());
        $summonerDTOs = array();

        foreach($parsedResponse as $summonerId => $arrTeams) {
            $teams = array();

            foreach($arrTeams as $arrTeam) {
                $teams[] = $teamDTOBuilder->buildTeamDTO($arrTeam);
            }

            $summonerDTOs[] = new SummonerDTO((int) $summonerId, $teams);
        }

        return new BySummonerIdsDTO($summonerDTOs);
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