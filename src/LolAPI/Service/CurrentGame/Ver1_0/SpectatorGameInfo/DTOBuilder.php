<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo;

use LolAPI\GameConstants\GameMode\GameModeFactoryInterface;
use LolAPI\GameConstants\GameType\GameTypeFactoryInterface;
use LolAPI\GameConstants\MapId\MapIdFactoryInterface;
use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueTypeFactoryInterface;
use LolAPI\GameConstants\Platform\PlatformFactoryInterface;
use LolAPI\Handler\LolAPIResponseInterface;
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
        $this->matchmakingQueueTypeFactory =$matchmakingQueueTypeFactory;
        $this->mapIdFactory = $mapIdFactory;
        $this->gameTypeFactory = $gameTypeFactory;
        $this->gameModeFactory = $gameModeFactory;
    }

    /**
     * Builds and returns CurrentGame.SpectatorGameInfo DTO
     * @param LolAPIResponseInterface $response
     * @return \LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\DTO\CurrentGameInfoDTO
     */
    public function buildDTO(LolAPIResponseInterface $response)
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
     * Returns GameType Factory
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
}