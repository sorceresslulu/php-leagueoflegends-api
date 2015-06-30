<?php
namespace LolAPI\Service\Team\Ver2_4\BySummonerIds;

use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Team\Ver2_4\BySummonerIds\DTO\BySummonerIdsDTO;
use LolAPI\Service\Team\Ver2_4\BySummonerIds\DTO\SummonerDTO;
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
     * Team.BySummonerIds DTO builder
     * @param GameModeFactory $gameModeFactory
     * @param $mapIdFactory
     */
    public function __construct(GameModeFactory $gameModeFactory, MapIdFactory $mapIdFactory)
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