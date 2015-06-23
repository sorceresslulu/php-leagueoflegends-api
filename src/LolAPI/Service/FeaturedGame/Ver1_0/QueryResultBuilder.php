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
     * Query Result Builder
     * @param MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory
     */
    public function __construct(MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory)
    {
        $this->matchmakingQueueTypeFactory = $matchmakingQueueTypeFactory;
    }

    /**
     * Returns MatchmakingQueueType Factory
     * @return MatchmakingQueueTypeFactory
     */
    protected function getMatchmakingQueueTypeFactory()
    {
        return $this->matchmakingQueueTypeFactory;
    }

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

    private function buildGameList(array $jsonGameList)
    {
        $games = array();

        foreach($jsonGameList as $jsonFeaturedGame) {
            $games[] = $this->buildFeaturedGameInfo($jsonFeaturedGame);
        }

        return $games;
    }

    private function buildFeaturedGameInfo(array $jsonGame)
    {
        $gameMode = GameModeFactory::createFromStringCode($jsonGame['gameMode']);
        $gameType = GameTypeFactory::createFromStringCode($jsonGame['gameType']);
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
            MapIdFactory::createFromIntCode((int) $jsonGame['mapId']),
            $jsonGame['platformId'],
            $bannedChampions,
            $observers,
            $participants
        );
    }

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

    private function buildObservers(array $observers)
    {
        return new Observer($observers['encryptionKey']);
    }

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
}