<?php
namespace LolAPI\Service\FeaturedGame\Ver1_0;

use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\GameType\GameTypeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueTypeFactory;
use LolAPI\GameConstants\Platform\PlatformFactory;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\FeaturedGame\Ver1_0\DTO\BannedChampion;
use LolAPI\Service\FeaturedGame\Ver1_0\DTO\FeaturedGameInfoDTO;
use LolAPI\Service\FeaturedGame\Ver1_0\DTO\FeaturedGames;
use LolAPI\Service\FeaturedGame\Ver1_0\DTO\Observer;
use LolAPI\Service\FeaturedGame\Ver1_0\DTO\Participant;

class DTOBuilder
{
    /**
     * Platform Factory
     * @var PlatformFactory
     */
    private $platformFactory;

    /**
     * MatchmakingQueueType Factory
     * @var MatchmakingQueueTypeFactory
     */
    private $matchmakingQueueTypeFactory;

    /**
     * MapId Factory
     * @var MapIdFactory
     */
    private $mapIdFactory;

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
     * FeaturedGames DTO builder
     * @param PlatformFactory $platformFactory
     * @param MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory
     * @param MapIdFactory $mapIdFactory
     * @param GameTypeFactory $gameTypeFactory
     * @param GameModeFactory $gameModeFactory
     */
    public function __construct(
        PlatformFactory $platformFactory,
        MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory,
        MapIdFactory $mapIdFactory,
        GameTypeFactory $gameTypeFactory,
        GameModeFactory $gameModeFactory
    ){
        $this->platformFactory = $platformFactory;
        $this->matchmakingQueueTypeFactory = $matchmakingQueueTypeFactory;
        $this->mapIdFactory = $mapIdFactory;
        $this->gameTypeFactory = $gameTypeFactory;
        $this->gameModeFactory = $gameModeFactory;
    }

    /**
     * Builds and returns FeaturedGamesDTO
     * @param ResponseInterface $response
     * @return FeaturedGames
     */
    public function buildDTO(ResponseInterface $response)
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
     * @return PlatformFactory
     */
    protected function getPlatformFactory()
    {
        return $this->platformFactory;
    }

    /**
     * Returns MatchmakingQueueType Factory
     * @return MatchmakingQueueTypeFactory
     */
    protected function getMatchmakingQueueTypeFactory()
    {
        return $this->matchmakingQueueTypeFactory;
    }

    /**
     * Returns MapId Factory
     * @return MapIdFactory
     */
    protected function getMapIdFactory()
    {
        return $this->mapIdFactory;
    }

    /**
     * @return GameTypeFactory
     */
    protected function getGameTypeFactory()
    {
        return $this->gameTypeFactory;
    }

    /**
     * @return GameModeFactory
     */
    protected function getGameModeFactory()
    {
        return $this->gameModeFactory;
    }}