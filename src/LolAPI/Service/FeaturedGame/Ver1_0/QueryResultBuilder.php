<?php
namespace LolAPI\Service\FeaturedGame\Ver1_0;

use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\GameType\GameTypeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueTypeFactory;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\FeaturedGame\Ver1_0\QueryResult;
use LolAPI\Service\FeaturedGame\Ver1_0\QueryResult\BannedChampion;
use LolAPI\Service\FeaturedGame\Ver1_0\QueryResult\FeaturedGameInfo;
use LolAPI\Service\FeaturedGame\Ver1_0\QueryResult\FeaturedGames;
use LolAPI\Service\FeaturedGame\Ver1_0\QueryResult\Observer;
use LolAPI\Service\FeaturedGame\Ver1_0\QueryResult\Participant;

class QueryResultBuilder
{
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
     * Query Result Builder
     * @param MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory
     * @param MapIdFactory $mapIdFactory
     * @param GameTypeFactory $gameTypeFactory
     * @param GameModeFactory $gameModeFactory
     */
    public function __construct(
        MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory,
        MapIdFactory $mapIdFactory,
        GameTypeFactory $gameTypeFactory,
        GameModeFactory $gameModeFactory
    ){
        $this->matchmakingQueueTypeFactory = $matchmakingQueueTypeFactory;
        $this->mapIdFactory = $mapIdFactory;
        $this->gameTypeFactory = $gameTypeFactory;
        $this->gameModeFactory = $gameModeFactory;
    }

    /**
     * Build QueryResult
     * @param ResponseInterface $response
     * @return QueryResult
     */
    public function build(ResponseInterface $response)
    {
        $jsonResponse = $response->parseJSON();

        if(isset($jsonResponse['gameList'])) {
            $gameList = $this->buildGameList($jsonResponse['gameList']);
        }else{
            $gameList = array();
        }

        $featuredGames = new FeaturedGames((int) $jsonResponse['clientRefreshInterval'], $gameList);

        return new QueryResult($response, $featuredGames);
    }

    /**
     * Build GameList
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
     * Build FeaturedGameInfo
     * @param array $jsonGame
     * @return FeaturedGameInfo
     */
    private function buildFeaturedGameInfo(array $jsonGame)
    {
        $gameMode = $this->getGameModeFactory()->createFromStringCode($jsonGame['gameMode']);
        $gameType = $this->getGameTypeFactory()->createFromStringCode($jsonGame['gameType']);
        $gameQueue = $this->getMatchmakingQueueTypeFactory()->createFromIntCode(isset($jsonGame['gameQueueConfigId']) ? (int) $jsonGame['gameQueueConfigId'] : null);

        $bannedChampions = isset($jsonGame['bannedChampions']) ? $this->buildBannedChampions($jsonGame['bannedChampions']) : array();
        $participants = isset($jsonGame['participants']) ? $this->buildParticipants($jsonGame['participants']) : array();
        $observers = $this->buildObservers($jsonGame['observers']);

        return new FeaturedGameInfo(
            $jsonGame['gameId'],
            $jsonGame['gameLength'],
            $gameMode,
            $gameType,
            $gameQueue,
            $jsonGame['gameStartTime'],
            $this->getMapIdFactory()->createFromIntCode((int) $jsonGame['mapId']),
            $jsonGame['platformId'],
            $bannedChampions,
            $observers,
            $participants
        );
    }

    /**
     * Build list of banned champions
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
     * Build Observer
     * @param array $observers
     * @return Observer
     */
    private function buildObservers(array $observers)
    {
        return new Observer($observers['encryptionKey']);
    }

    /**
     * Build list of participants
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
     * Returns GameType Factory
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
}