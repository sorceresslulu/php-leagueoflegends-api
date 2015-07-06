<?php
namespace LolAPI\Service\FeaturedGame\Ver1_0;

use LolAPI\GameConstants\GameMode\GameModeFactoryInterface;
use LolAPI\GameConstants\GameType\GameTypeFactoryInterface;
use LolAPI\GameConstants\MapId\MapIdFactoryInterface;
use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueTypeFactoryInterface;
use LolAPI\GameConstants\Platform\PlatformFactoryInterface;
use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\FeaturedGame\Ver1_0\DTO\BannedChampion;
use LolAPI\Service\FeaturedGame\Ver1_0\DTO\FeaturedGameInfoDTO;
use LolAPI\Service\FeaturedGame\Ver1_0\DTO\FeaturedGames;
use LolAPI\Service\FeaturedGame\Ver1_0\DTO\Observer;
use LolAPI\Service\FeaturedGame\Ver1_0\DTO\Participant;

class DTOBuilder
{
    /**
     * Platform Factory
     * @var PlatformFactoryInterface
     */
    private $platformFactory;

    /**
     * MatchmakingQueueType Factory
     * @var MatchmakingQueueTypeFactoryInterface
     */
    private $matchmakingQueueTypeFactory;

    /**
     * MapId Factory
     * @var MapIdFactoryInterface
     */
    private $mapIdFactory;

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
     * FeaturedGames DTO builder
     * @param PlatformFactoryInterface $platformFactory
     * @param MatchmakingQueueTypeFactoryInterface $matchmakingQueueTypeFactory
     * @param MapIdFactoryInterface $mapIdFactory
     * @param GameTypeFactoryInterface $gameTypeFactory
     * @param GameModeFactoryInterface $gameModeFactory
     */
    public function __construct(
        PlatformFactoryInterface $platformFactory,
        MatchmakingQueueTypeFactoryInterface $matchmakingQueueTypeFactory,
        MapIdFactoryInterface $mapIdFactory,
        GameTypeFactoryInterface $gameTypeFactory,
        GameModeFactoryInterface $gameModeFactory
    ){
        $this->platformFactory = $platformFactory;
        $this->matchmakingQueueTypeFactory = $matchmakingQueueTypeFactory;
        $this->mapIdFactory = $mapIdFactory;
        $this->gameTypeFactory = $gameTypeFactory;
        $this->gameModeFactory = $gameModeFactory;
    }

    /**
     * Builds and returns FeaturedGamesDTO
     * @param LolAPIResponseInterface $response
     * @return FeaturedGames
     */
    public function buildDTO(LolAPIResponseInterface $response)
    {
        $parsedResponse = $response->parse();

        if(isset($parsedResponse['gameList'])) {
            $gameList = $this->buildGameList($parsedResponse['gameList']);
        }else{
            $gameList = array();
        }

        return new FeaturedGames((int) $parsedResponse['clientRefreshInterval'], $gameList);
    }

    /**
     * Builds GameList
     * @param array $jsonGameList
     * @return array
     */
    private function buildGameList(array $jsonGameList)
    {
        $games = array();

        foreach($jsonGameList as $jsonFeaturedGame) {
            $games[] = $this->buildFeaturedGameInfo($jsonFeaturedGame);
        }

        return $games;
    }

    /**
     * Builds FeaturedGameInfo
     * @param array $jsonGame
     * @return \LolAPI\Service\FeaturedGame\Ver1_0\DTO\FeaturedGameInfoDTO
     */
    private function buildFeaturedGameInfo(array $jsonGame)
    {
        $gameMode = $this->getGameModeFactory()->createFromStringCode($jsonGame['gameMode']);
        $gameType = $this->getGameTypeFactory()->createFromStringCode($jsonGame['gameType']);
        $gameQueue = $this->getMatchmakingQueueTypeFactory()->createFromIntCode(isset($jsonGame['gameQueueConfigId']) ? (int) $jsonGame['gameQueueConfigId'] : null);

        $bannedChampions = isset($jsonGame['bannedChampions']) ? $this->buildBannedChampions($jsonGame['bannedChampions']) : array();
        $participants = isset($jsonGame['participants']) ? $this->buildParticipants($jsonGame['participants']) : array();
        $observers = $this->buildObservers($jsonGame['observers']);

        return new FeaturedGameInfoDTO(
            $jsonGame['gameId'],
            $jsonGame['gameLength'],
            $gameMode,
            $gameType,
            $gameQueue,
            $jsonGame['gameStartTime'],
            $this->getMapIdFactory()->createFromIntCode((int) $jsonGame['mapId']),
            $this->getPlatformFactory()->createFromStringCode($jsonGame['platformId']),
            $bannedChampions,
            $observers,
            $participants
        );
    }

    /**
     * Builds list of banned champions
     * @param array $jsonBannedChampions
     * @return array
     */
    private function buildBannedChampions(array $jsonBannedChampions)
    {
        $bannedChampions = array();

        foreach($jsonBannedChampions as $jsonBannedChampion) {
            $bannedChampions[] = new BannedChampion(
                (int) $jsonBannedChampion['championId'],
                (int) $jsonBannedChampion['pickTurn'],
                (int) $jsonBannedChampion['teamId']
            );
        }

        return $bannedChampions;
    }

    /**
     * Builds Observer
     * @param array $observers
     * @return \LolAPI\Service\FeaturedGame\Ver1_0\DTO\Observer
     */
    private function buildObservers(array $observers)
    {
        return new Observer($observers['encryptionKey']);
    }

    /**
     * Builds list of participants
     * @param array $jsonParticipants
     * @return array
     */
    private function buildParticipants(array $jsonParticipants)
    {
        $participants = array();

        foreach($jsonParticipants as $jsonParticipant) {
            $participants[] = new Participant(
                (bool) $jsonParticipant['bot'],
                (int) $jsonParticipant['championId'],
                (int) $jsonParticipant['profileIconId'],
                (int) $jsonParticipant['spell1Id'],
                (int) $jsonParticipant['spell2Id'],
                $jsonParticipant['summonerName'],
                (int) $jsonParticipant['teamId']
            );
        }

        return $participants;
    }

    /**
     * Returns Platform Factory
     * @return PlatformFactoryInterface
     */
    protected function getPlatformFactory()
    {
        return $this->platformFactory;
    }

    /**
     * Returns MatchmakingQueueType Factory
     * @return MatchmakingQueueTypeFactoryInterface
     */
    protected function getMatchmakingQueueTypeFactory()
    {
        return $this->matchmakingQueueTypeFactory;
    }

    /**
     * Returns MapId Factory
     * @return MapIdFactoryInterface
     */
    protected function getMapIdFactory()
    {
        return $this->mapIdFactory;
    }

    /**
     * @return GameTypeFactoryInterface
     */
    protected function getGameTypeFactory()
    {
        return $this->gameTypeFactory;
    }

    /**
     * @return GameModeFactoryInterface
     */
    protected function getGameModeFactory()
    {
        return $this->gameModeFactory;
    }}