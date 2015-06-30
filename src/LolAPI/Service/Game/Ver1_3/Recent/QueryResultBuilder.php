<?php
namespace LolAPI\Service\Game\Ver1_3\Recent;

use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\GameType\GameTypeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\GameConstants\SubType\SubTypeFactory;
use LolAPI\GameConstants\TeamSide\TeamSideFactory;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Game\Ver1_3\Recent\QueryResult\GameDTO;
use LolAPI\Service\Game\Ver1_3\Recent\QueryResult\PlayerDTO;
use LolAPI\Service\Game\Ver1_3\Recent\QueryResult\RawStatsDTO;
use LolAPI\Service\Game\Ver1_3\Recent\QueryResult\RecentGamesDTO;

class QueryResultBuilder
{
    /**
     * TeamSide Factory
     * @var TeamSideFactory
     */
    private $teamSideFactory;

    /**
     * GameType Factory
     * @var GameTypeFactory
     */
    private $gameTypeFactory;

    /**
     * GameMode Factory
     * @var GameModeFactory
     */
    private $gameModeFactory;

    /**
     * SubType Factory
     * @var SubTypeFactory
     */
    private $subTypeFactory;

    /**
     * MapId Factory
     * @var MapIdFactory
     */
    private $mapIdFactory;

    public function __construct(
        TeamSideFactory $teamSideFactory,
        GameTypeFactory $gameTypeFactory,
        GameModeFactory $gameModeFactory,
        SubTypeFactory $subTypeFactory,
        MapIdFactory $mapIdFactory
    ){
        $this->teamSideFactory = $teamSideFactory;
        $this->gameTypeFactory = $gameTypeFactory;
        $this->gameModeFactory = $gameModeFactory;
        $this->subTypeFactory = $subTypeFactory;
        $this->mapIdFactory = $mapIdFactory;
    }

    public function build(ResponseInterface $response)
    {
        $jsonResponse = $response->parse();
        $games = array();

        foreach($jsonResponse['games'] as $jsonGame) {
            $games[] = $this->buildGame($jsonGame);
        }

        return new QueryResult($response, new RecentGamesDTO((int) $jsonResponse['summonerId'], $games));
    }

    protected function buildGame(array $jsonGame)
    {
        $fellowPlayers = array();

        if(isset($jsonGame['fellowPlayers'])) {
            foreach($jsonGame['fellowPlayers'] as $arrFellowPLayer) {
                $fellowPlayers[] = $this->buildFellowPlayer($arrFellowPLayer);
            }
        }

        return new GameDTO(
            (int) $jsonGame['championId'],
            (int) $jsonGame['createDate'],
            $fellowPlayers,
            (int) $jsonGame['gameId'],
            $this->getGameModeFactory()->createFromStringCode($jsonGame['gameMode']),
            $this->getGameTypeFactory()->createFromStringCode($jsonGame['gameType']),
            $this->getSubTypeFactory()->createFromStringCode($jsonGame['subType']),
            $this->getMapIdFactory()->createFromIntCode($jsonGame['mapId']),
            $this->getTeamSideFactory()->createFromTeamId($jsonGame['teamId']),
            (bool) $jsonGame['invalid'],
            (int) $jsonGame['ipEarned'],
            (int) $jsonGame['level'],
            (int) $jsonGame['spell1'],
            (int) $jsonGame['spell2'],
            new RawStatsDTO($jsonGame['stats'])
        );
    }

    protected function buildFellowPlayer(array $arrFellowPlayer)
    {
        return new PlayerDTO(
            (int) $arrFellowPlayer['championId'],
            (int) $arrFellowPlayer['summonerId'],
            (int) $arrFellowPlayer['teamId']
        );
    }

    /**
     * Returns TeamSide Factory
     * @return TeamSideFactory
     */
    protected function getTeamSideFactory()
    {
        return $this->teamSideFactory;
    }

    /**
     * returns GameType Factory
     * @return GameTypeFactory
     */
    protected function getGameTypeFactory()
    {
        return $this->gameTypeFactory;
    }

    /**
     * Returns GameMode Factory
     * @return GameModeFactory
     */
    protected function getGameModeFactory()
    {
        return $this->gameModeFactory;
    }

    /**
     * Returns SubType Factory
     * @return SubTypeFactory
     */
    protected function getSubTypeFactory()
    {
        return $this->subTypeFactory;
    }

    /**
     * Returns MapID Factory
     * @return MapIdFactory
     */
    public function getMapIdFactory()
    {
        return $this->mapIdFactory;
    }
}