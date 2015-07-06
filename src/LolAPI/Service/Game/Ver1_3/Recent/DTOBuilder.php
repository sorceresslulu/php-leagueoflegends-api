<?php
namespace LolAPI\Service\Game\Ver1_3\Recent;

use LolAPI\GameConstants\GameMode\GameModeFactoryInterface;
use LolAPI\GameConstants\GameType\GameTypeFactoryInterface;
use LolAPI\GameConstants\MapId\MapIdFactoryInterface;
use LolAPI\GameConstants\SubType\SubTypeFactoryInterface;
use LolAPI\GameConstants\TeamSide\TeamSideFactoryInterface;
use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\Game\Ver1_3\Recent\DTO\GameDTO;
use LolAPI\Service\Game\Ver1_3\Recent\DTO\PlayerDTO;
use LolAPI\Service\Game\Ver1_3\Recent\DTO\RawStatsDTO;
use LolAPI\Service\Game\Ver1_3\Recent\DTO\RecentGamesDTO;

class DTOBuilder
{
    /**
     * TeamSide Factory
     * @var TeamSideFactoryInterface
     */
    private $teamSideFactory;

    /**
     * GameType Factory
     * @var GameTypeFactoryInterface
     */
    private $gameTypeFactory;

    /**
     * GameMode Factory
     * @var GameModeFactoryInterface
     */
    private $gameModeFactory;

    /**
     * SubType Factory
     * @var SubTypeFactoryInterface
     */
    private $subTypeFactory;

    /**
     * MapId Factory
     * @var MapIdFactoryInterface
     */
    private $mapIdFactory;

    /**
     * Game.Recent DTO builder
     * @param TeamSideFactoryInterface $teamSideFactory
     * @param GameTypeFactoryInterface $gameTypeFactory
     * @param GameModeFactoryInterface $gameModeFactory
     * @param SubTypeFactoryInterface $subTypeFactory
     * @param MapIdFactoryInterface $mapIdFactory
     */
    public function __construct(
        TeamSideFactoryInterface $teamSideFactory,
        GameTypeFactoryInterface $gameTypeFactory,
        GameModeFactoryInterface $gameModeFactory,
        SubTypeFactoryInterface $subTypeFactory,
        MapIdFactoryInterface $mapIdFactory
    ){
        $this->teamSideFactory = $teamSideFactory;
        $this->gameTypeFactory = $gameTypeFactory;
        $this->gameModeFactory = $gameModeFactory;
        $this->subTypeFactory = $subTypeFactory;
        $this->mapIdFactory = $mapIdFactory;
    }

    /**
     * Builds and returns Game.Recent DTO
     * @param LolAPIResponseInterface $response
     * @return RecentGamesDTO
     */
    public function buildDTO(LolAPIResponseInterface $response)
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
     * @return TeamSideFactoryInterface
     */
    protected function getTeamSideFactory()
    {
        return $this->teamSideFactory;
    }

    /**
     * returns GameType Factory
     * @return GameTypeFactoryInterface
     */
    protected function getGameTypeFactory()
    {
        return $this->gameTypeFactory;
    }

    /**
     * Returns GameMode Factory
     * @return GameModeFactoryInterface
     */
    protected function getGameModeFactory()
    {
        return $this->gameModeFactory;
    }

    /**
     * Returns SubType Factory
     * @return SubTypeFactoryInterface
     */
    protected function getSubTypeFactory()
    {
        return $this->subTypeFactory;
    }

    /**
     * Returns MapID Factory
     * @return MapIdFactoryInterface
     */
    public function getMapIdFactory()
    {
        return $this->mapIdFactory;
    }
}