<?php
namespace LolAPIExamples\CurrentGame;

use LolAPI\Exceptions\SpectatorGameInfoNotFoundException;
use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\GameType\GameTypeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueTypeFactory;
use LolAPI\GameConstants\MatchmakingQueueType\UnknownMQTPolicy\ThrowOutOfBoundsExceptionPolicy;
use LolAPI\GameConstants\Platform\PlatformFactory;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\DTO\CurrentGameInfoDTO;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\DTOBuilder;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\Request;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\Service;
use LolAPIExamples\ExampleTest;

class SpectatorGameInfoTest extends ExampleTest
{
    public function testExample()
    {
        $config = $this->getConfig();
        $service = new Service($this->getLolAPIHandler());

        try {
            $request = new Request(
                $this->getApiKey(),
                $this->getRegionalEndpoint(),
                $config['summonerId']
            );

            $query = $service->createQuery($request);
            $response = $query->execute();

            if($this->isOutputEnabled()) {
                $this->processResult($this->generateDTO($response));
            }
        }catch(SpectatorGameInfoNotFoundException $e) {
            println("Current game is not available atm", 1);
        }
    }

    private function generateDTO(ResponseInterface $response)
    {
        $platformFactory = new PlatformFactory(new \LolAPI\GameConstants\Platform\UnknownPlatformPolicy\DefaultPolicy());

        $matchmakingQueueTypeFactory = new MatchmakingQueueTypeFactory(
            new ThrowOutOfBoundsExceptionPolicy()
        );

        $mapIdFactory = new MapIdFactory(
            new \LolAPI\GameConstants\MapId\UnknownMapIdPolicy\ThrowOutOfBoundsExceptionPolicy()
        );

        $gameTypeFactory = new GameTypeFactory(
            new \LolAPI\GameConstants\GameType\UnknownGameTypePolicy\ThrowOutOfBoundsExceptionPolicy()
        );

        $gameModeFactory = new GameModeFactory(
            new \LolAPI\GameConstants\GameMode\UnknownGameModePolicy\ThrowOutOfBoundsExceptionPolicy()
        );

        $dtoBuilder = new DTOBuilder($platformFactory, $matchmakingQueueTypeFactory, $mapIdFactory, $gameTypeFactory, $gameModeFactory);

        return $dtoBuilder->buildDTO($response);
   }

    private function processResult(CurrentGameInfoDTO $currentGameInfo)
    {
        println(sprintf("GameId: %s", $currentGameInfo->getGameId()), 1);
        println(sprintf("GameStartTime: %s", $currentGameInfo->getGameStartTime()), 1);
        println(sprintf("GameLength: %s", $currentGameInfo->getGameLength()), 1);
        println(sprintf("GameMode: %s", $currentGameInfo->getGameMode()->getCode()), 1);

        println("MatchmakingQueue", 1);
        println(sprintf("QueueType: %s", $currentGameInfo->getGameQueueType()->getQueueType()), 2);
        println(sprintf("ConfigId: %s", $currentGameInfo->getGameQueueType()->getGameQueueConfigId()), 2);
        println(sprintf("Description: %s", $currentGameInfo->getGameQueueType()->getDescription()), 2);

        println(sprintf("MapId: %s", $currentGameInfo->getMapId()->getId()), 1);
        println(sprintf("MapId/Name: %s", $currentGameInfo->getMapId()->getName()), 1);
        println(sprintf("MapId/Notes: %s", $currentGameInfo->getMapId()->getNotes()), 1);
        println(sprintf("PlatformId: %s", $currentGameInfo->getPlatformId()), 1);
        println(sprintf("ObserverKey: %s", $currentGameInfo->getObservers()->getEncryptionKey()), 1);

        if ($currentGameInfo->hasBannedChampions()) {
            println("Banned champions", 1);

            foreach ($currentGameInfo->getBannedChampions() as $bannedChampion) {
                println(sprintf("ChampionId: %d", $bannedChampion->getChampionId()), 2);
                println(sprintf("PickTurn: %d", $bannedChampion->getPickTurn()), 2);
                println(sprintf("TeamId: %d", $bannedChampion->getTeamId()), 2);
                println(' ', 2);
            }
        }

        if ($currentGameInfo->hasParticipants()) {
            println("Participants", 1);

            foreach ($currentGameInfo->getParticipants() as $participant) {
                println(sprintf("SummonerName: %s", $participant->getSummonerName()), 2);
                println(sprintf("ChampionId: %s", $participant->getChampionId()), 2);
                println(sprintf("TeamId: %s", $participant->getTeamId()), 2);
                println(sprintf("ProfileIconId: %s", $participant->getProfileIconId()), 2);
                println(sprintf("SpellId1: %s", $participant->getSpell1Id()), 2);
                println(sprintf("SpellId2: %s", $participant->getSpell2Id()), 2);
                println(sprintf("IsBot: %s", ($participant->isBot() ? 'true' : 'false')), 2);
                println(' ', 2);
            }
        }
    }
}
