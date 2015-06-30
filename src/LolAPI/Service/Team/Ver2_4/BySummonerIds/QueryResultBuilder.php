<?php
namespace LolAPI\Service\Team\Ver2_4\BySummonerIds;

use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Team\Ver2_4\BySummonerIds\QueryResult\SummonerDTO;
use LolAPI\Service\Team\Ver2_4\TeamDTOBuilder;


class QueryResultBuilder
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
     * QueryResultBuilder
     * @param GameModeFactory $gameModeFactory
     * @param $mapIdFactory
     */
    public function __construct(GameModeFactory $gameModeFactory, MapIdFactory $mapIdFactory)
    {
        $this->gameModeFactory = $gameModeFactory;
        $this->mapIdFactory = $mapIdFactory;
    }

    /**
     * Builds QueryResult object
     * @param ResponseInterface $response
     * @return QueryResult
     */
    public function build(ResponseInterface $response)
    {
        $jsonResponse = $response->parse();
        $teamDTOBuilder = new TeamDTOBuilder($this->getGameModeFactory(), $this->getMapIdFactory());
        $summonerDTOs = array();

        foreach($jsonResponse as $summonerId => $arrTeams) {
            $teams = array();

            foreach($arrTeams as $arrTeam) {
                $teams[] = $teamDTOBuilder->buildTeamDTO($arrTeam);
            }

            $summonerDTOs[] = new SummonerDTO((int) $summonerId, $teams);
        }

        return new QueryResult($response, $summonerDTOs);
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