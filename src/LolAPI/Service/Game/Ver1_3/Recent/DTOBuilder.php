<?php
namespace LolAPI\Service\Game\Ver1_3\Recent;

use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\GameType\GameTypeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\GameConstants\SubType\SubTypeFactory;
use LolAPI\GameConstants\TeamSide\TeamSideFactory;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Game\Ver1_3\Recent\DTO\GameDTO;
use LolAPI\Service\Game\Ver1_3\Recent\DTO\PlayerDTO;
use LolAPI\Service\Game\Ver1_3\Recent\DTO\RawStatsDTO;
use LolAPI\Service\Game\Ver1_3\Recent\DTO\RecentGamesDTO;

class DTOBuilder
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

    /**
     * Game.Recent DTO builder
     * @param TeamSideFactory $teamSideFactory
     * @param GameTypeFactory $gameTypeFactory
     * @param GameModeFactory $gameModeFactory
     * @param SubTypeFactory $subTypeFactory
     * @param MapIdFactory $mapIdFactory
     */
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

    /**
     * Builds and returns Game.Recent DTO
     * @param ResponseInterface $response
     * @return RecentGamesDTO
     */
    public function buildDTO(ResponseInterface $response)
    {
        $parsedResponse = $response->parse();
        $games = array();

        foreach($parsedResponse['games'] as $jsonGame) {
            $games[] = $this->buildGame($jsonGame);
        }

        return new RecentGamesDTO((int) $parsedResponse['summonerId'], $games);
    }

    /**
     * Builds GameDTO
     * @param array $jsonGame
     * @return GameDTO
     */
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

    /**
     * Builds PlayerDTO
     * @param array $arrFellowPlayer
     * @return PlayerDTO
     */
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