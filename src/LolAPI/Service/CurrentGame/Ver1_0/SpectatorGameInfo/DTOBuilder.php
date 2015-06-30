<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo;

use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\GameType\GameTypeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueTypeFactory;
use LolAPI\GameConstants\Platform\PlatformFactory;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\DTO\BannedChampion;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\DTO\CurrentGameInfoDTO;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\DTO\CurrentGameParticipant;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\DTO\Mastery;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\DTO\Observer;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\DTO\Rune;

class DTOBuilder
{
    /**
     * CurrentGame.SpectatorGameInfo DTO builder
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
        $this->matchmakingQueueTypeFactory =$matchmakingQueueTypeFactory;
        $this->mapIdFactory = $mapIdFactory;
        $this->gameTypeFactory = $gameTypeFactory;
        $this->gameModeFactory = $gameModeFactory;
    }

    /**
     * Builds and returns CurrentGame.SpectatorGameInfo DTO
     * @param ResponseInterface $response
     * @return QueryResult
     */
    public function buildDTO(ResponseInterface $response)
    {
        return $this->buildCurrentGameInfoDTO($response->parse());
    }

    /**
     * Builds CurrentGameInfo DTO
     * @param array $parsedResponse
     * @return \LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\DTO\CurrentGameInfoDTO
     */
    private function buildCurrentGameInfoDTO(array $parsedResponse)
    {
        $participants = array();
        $bannedChampions = array();

        if(isset($parsedResponse['participants'])) {
            $participants = $this->buildParticipants($parsedResponse['participants']);
        }

        if(isset($parsedResponse['bannedChampions'])) {
            $bannedChampions = $this->buildBannedChampions($parsedResponse['bannedChampions']);
        }

        return new CurrentGameInfoDTO(
            (int) $parsedResponse['gameId'],
            $this->getPlatformFactory()->createFromStringCode($parsedResponse['platformId']),
            (int) $parsedResponse['gameStartTime'],
            (int) $parsedResponse['gameLength'],
            $this->getGameTypeFactory()->createFromStringCode($parsedResponse['gameType']),
            $this->getGameModeFactory()->createFromStringCode($parsedResponse['gameMode']),
            $this->getMapIdFactory()->createFromIntCode((int) $parsedResponse['mapId']),
            $this->getMatchmakingQueueTypeFactory()->createFromIntCode(isset($parsedResponse['gameQueueConfigId']) ? (int) $parsedResponse['gameQueueConfigId'] : null),
            $participants,
            $bannedChampions,
            new Observer($parsedResponse['observers']['encryptionKey'])
        );
    }

    /**
     * Builds list of participants
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
     * Builds participant
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
     * Builds list of banned champions
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

    /**
     * Returns platform factory
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