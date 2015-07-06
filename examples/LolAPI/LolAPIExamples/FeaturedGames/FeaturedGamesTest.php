<?php
namespace LolAPIExamples\FeaturedGames;

use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\GameType\GameTypeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueTypeFactory;
use LolAPI\GameConstants\Platform\PlatformFactory;
use LolAPI\GameConstants\Platform\UnknownPlatformPolicy\ThrowOutOfBoundsExceptionPolicy;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\FeaturedGame\Ver1_0\DTO\FeaturedGames;
use LolAPI\Service\FeaturedGame\Ver1_0\DTOBuilder;
use LolAPI\Service\FeaturedGame\Ver1_0\Request;
use LolAPI\Service\FeaturedGame\Ver1_0\Service;
use LolAPIExamples\ExampleTest;

class FeaturedGamesTest extends ExampleTest
{
    public function testExample()
    {
        $service = new Service($this->getLolAPIHandler());

        $request = new Request($this->getApiKey(), $this->getRegionalEndpoint());
        $query = $service->createQuery($request);
        $response = $query->execute();

        if($this->isOutputEnabled()) {
            $this->processRequest($this->buildDTO($response));
        }
    }

    private function buildDTO(ResponseInterface $response)
    {
        $platformFactory = new PlatformFactory(
            new ThrowOutOfBoundsExceptionPolicy()
        );

        $matchmakingQueueTypeFactory = new MatchmakingQueueTypeFactory(
            new \LolAPI\GameConstants\MatchmakingQueueType\UnknownMQTPolicy\ThrowOutOfBoundsExceptionPolicy()
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

        $dtoBuilder = new DTOBuilder(
            $platformFactory,
            $matchmakingQueueTypeFactory,
            $mapIdFactory,
            $gameTypeFactory,
            $gameModeFactory
        );

        return $dtoBuilder->buildDTO($response);
    }

    private function processRequest(FeaturedGames $featuredGames)
    {
        println(sprintf("ClientRefreshInterval: %d", $featuredGames->getClientRefreshInterval()));

        foreach ($featuredGames->getGameList() as $featuredGameInfo) {
            println(sprintf("GameId: %s", $featuredGameInfo->getGameId()), 1);
            println(sprintf("GameStartTime: %s", $featuredGameInfo->getGameStartTime()), 1);
            println(sprintf("GameLength: %s", $featuredGameInfo->getGameLength()), 1);
            println(sprintf("GameMode: %s", $featuredGameInfo->getGameMode()->getCode()), 1);

            println("MatchmakingQueue", 1);
            println(sprintf("QueueType: %s", $featuredGameInfo->getGameQueueType()->getQueueType()), 2);
            println(sprintf("ConfigId: %s", $featuredGameInfo->getGameQueueType()->getGameQueueConfigId()), 2);
            println(sprintf("Description: %s", $featuredGameInfo->getGameQueueType()->getDescription()), 2);

            println(sprintf("MapId: %s", $featuredGameInfo->getMapId()->getId()), 1);
            println(sprintf("MapId/Name: %s", $featuredGameInfo->getMapId()->getName()), 1);
            println(sprintf("MapId/Notes: %s", $featuredGameInfo->getMapId()->getNotes()), 1);
            println(sprintf("PlatformId: %s", $featuredGameInfo->getPlatform()->getPlatformId()), 1);
            println(sprintf("ObserverKey: %s", $featuredGameInfo->getObservers()->getEncryptionKey()), 1);

            if ($featuredGameInfo->hasBannedChampions()) {
                println("Banned champions", 1);

                foreach ($featuredGameInfo->getBannedChampions() as $bannedChampion) {
                    println(sprintf("ChampionId: %d", $bannedChampion->getChampionId()), 2);
                    println(sprintf("PickTurn: %d", $bannedChampion->getPickTurn()), 2);
                    println(sprintf("TeamId: %d", $bannedChampion->getTeamId()), 2);
                    println(' ', 2);
                }
            }

            if ($featuredGameInfo->hasParticipants()) {
                println("Participants", 1);

                foreach ($featuredGameInfo->getParticipants() as $participant) {
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

            println('----------', 1);
        }
    }
}