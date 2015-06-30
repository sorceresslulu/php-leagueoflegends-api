<?php
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\DTOBuilder;

$testFunc = function()
{
    $config = getConfig();
    $apiKey = new \LolAPI\APIKey($config['apiKey']);
    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);
    $platformFactory = new \LolAPI\GameConstants\Platform\PlatformFactory(new \LolAPI\GameConstants\Platform\UnknownPlatformPolicy\DefaultPolicy());

    $matchmakingQueueTypeFactory = new \LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueTypeFactory(
        new \LolAPI\GameConstants\MatchmakingQueueType\UnknownMQTPolicy\ThrowOutOfBoundsExceptionPolicy()
    );

    $mapIdFactory = new \LolAPI\GameConstants\MapId\MapIdFactory(
        new \LolAPI\GameConstants\MapId\UnknownMapIdPolicy\ThrowOutOfBoundsExceptionPolicy()
    );

    $gameTypeFactory = new \LolAPI\GameConstants\GameType\GameTypeFactory(
        new \LolAPI\GameConstants\GameType\UnknownGameTypePolicy\ThrowOutOfBoundsExceptionPolicy()
    );

    $gameModeFactory = new \LolAPI\GameConstants\GameMode\GameModeFactory(
        new \LolAPI\GameConstants\GameMode\UnknownGameModePolicy\ThrowOutOfBoundsExceptionPolicy()
    );

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\Service($apiHandler);

    $processQueryResult = function(LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\DTO\CurrentGameInfoDTO $currentGameInfo)
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
    };

    try {
        $request = new LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\Request(
            $apiKey,
            $regionEndpoint,
            $config['summonerId'],
            $platformFactory->createFromStringCode($config['platformId'])
        );

        $query = $service->createQuery($request);
        $response = $query->execute();

        $dtoBuilder = new DTOBuilder($platformFactory, $matchmakingQueueTypeFactory, $mapIdFactory, $gameTypeFactory, $gameModeFactory);
        $dto = $dtoBuilder->buildDTO($response);

        $processQueryResult($dto);
    }catch(\LolAPI\Exceptions\SpectatorGameInfoNotFoundException $e) {
        echo "no current game available!";
    }
};

if (!count(debug_backtrace())) {
    require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

    $testFunc();
}else{
    return $testFunc;
}