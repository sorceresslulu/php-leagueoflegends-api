<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo;

use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\GameType\GameTypeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueTypeFactory;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Platform\PlatformFactory;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\QueryResult\BannedChampion;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\QueryResult\CurrentGameInfo;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\QueryResult\CurrentGameParticipant;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\QueryResult\Mastery;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\QueryResult\Observer;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\QueryResult\Rune;

class QueryResultBuilder
{
    /**
     * Platform factory
     * @var PlatformFactory
     */
    private $platformFactory;

    /**
     * MatchmakingQueueType Factory
     * @var MatchmakingQueueTypeFactory
     */
    private $matchmakingQueueTypeFactory;

    /**
     * Query Result Builder
     * @param PlatformFactory $platformFactory
     * @param MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory
     */
    public function __construct(PlatformFactory $platformFactory, MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory)
    {
        $this->platformFactory = $platformFactory;
        $this->matchmakingQueueTypeFactory = $matchmakingQueueTypeFactory;
    }

    /**
     * Returns platform factory
     * @return PlatformFactory
     */
    protected function getPlatformFactory()
    {
        return $this->platformFactory;
    }

    /**
     * Return MatchmakingQueueType Factory
     * @return MatchmakingQueueTypeFactory
     */
    protected function getMatchmakingQueueTypeFactory()
    {
        return $this->matchmakingQueueTypeFactory;
    }

    /**
     * Query Result Builder
     * @param ResponseInterface $response
     * @return QueryResult
     */
    public function build(ResponseInterface $response)
    {
        return new QueryResult($response, $this->buildCurrentGameInfo($response->parseJSON()));
    }

    /**
     * Build CurrentGameInfo
     * @param array $jsonResponse
     * @return CurrentGameInfo
     */
    private function buildCurrentGameInfo(array $jsonResponse)
    {
        $participants = array();
        $bannedChampions = array();

        if(isset($jsonResponse['participants'])) {
            $participants = $this->buildParticipants($jsonResponse['participants']);
        }

        if(isset($jsonResponse['bannedChampions'])) {
            $bannedChampions = $this->buildBannedChampions($jsonResponse['bannedChampions']);
        }

        return new CurrentGameInfo(
            (int) $jsonResponse['gameId'],
            $this->getPlatformFactory()->createFromStringCode($jsonResponse['platformId']),
            (int) $jsonResponse['gameStartTime'],
            (int) $jsonResponse['gameLength'],
            GameTypeFactory::createFromStringCode($jsonResponse['gameType']),
            GameModeFactory::createFromStringCode($jsonResponse['gameMode']),
            MapIdFactory::createFromIntCode((int) $jsonResponse['mapId']),
            $this->getMatchmakingQueueTypeFactory()->createFromIntCode(isset($jsonResponse['gameQueueConfigId']) ? (int) $jsonResponse['gameQueueConfigId'] : null),
            $participants,
            $bannedChampions,
            new Observer($jsonResponse['observers']['encryptionKey'])
        );
    }

    /**
     * Build list of participants
     * @param array $jsonParticipants
     * @return array
     */
    private function buildParticipants(array $jsonParticipants)
    {
        $participants = array();

        foreach($jsonParticipants as $arrParticipant) {
            $participants[] = $this->buildParticipant($arrParticipant);
        }

        return $participants;
    }

    /**
     * Build participant
     * @param array $jsonParticipant
     * @return CurrentGameParticipant
     */
    private function buildParticipant(array $jsonParticipant)
    {
        $masteries = array();
        $runes = array();

        if(isset($jsonParticipant['masteries'])) {
            foreach($jsonParticipant['masteries'] as $arrMastery) {
                $masteries[] = new Mastery((int) $arrMastery['masteryId'], (int) $arrMastery['rank']);
            }
        }

        if(isset($jsonParticipant['runes'])) {
            foreach($jsonParticipant['runes'] as $arrRune) {
                $runes[] = new Rune((int) $arrRune['runeId'], (int) $arrRune['count']);
            }
        }

        return new CurrentGameParticipant(
            (int) $jsonParticipant['summonerId'],
            $jsonParticipant['summonerName'],
            (int) $jsonParticipant['profileIconId'],
            (int) $jsonParticipant['teamId'],
            (int) $jsonParticipant['championId'],
            (bool) $jsonParticipant['bot'],
            (int) $jsonParticipant['spell1Id'],
            (int) $jsonParticipant['spell2Id'],
            $masteries,
            $runes
        );
    }

    /**
     * Build list of banned champions
     * @param array $jsonBannedChampions
     * @return array]
     */
    private function buildBannedChampions(array $jsonBannedChampions)
    {
        $bannedChampions = array();

        foreach($jsonBannedChampions as $arrBan) {
            $bannedChampions[] = new BannedChampion(
                (int) $arrBan['championId'],
                (int) $arrBan['pickTurn'],
                (int) $arrBan['teamId']
            );
        }

        return $bannedChampions;
    }
}