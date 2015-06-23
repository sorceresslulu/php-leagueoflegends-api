<?php
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

$config = getConfig();
$apiKey = new \LolAPI\APIKey($config['apiKey']);
$regionFactory = new \LolAPI\Region\RegionFactory(new \LolAPI\Region\UnknownRegionPolicy\ThrowUnknownRegionExceptionPolicy());
$region = $regionFactory->getRegionByStringCode($config['region']);

$platformFactory = new \LolAPI\GameConstants\Platform\PlatformFactory(
    new \LolAPI\GameConstants\Platform\UnknownPlatformPolicy\ThrowOutOfBoundsExceptionPolicy()
);

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

$subTypesFactory = new \LolAPI\GameConstants\SubType\SubTypeFactory(
    new LolAPI\GameConstants\SubType\UnknownSubTypePolicy\ThrowOutOfBoundsExceptionPolicy()
);

$teamSideFactory = new \LolAPI\GameConstants\TeamSide\TeamSideFactory(
    new LolAPI\GameConstants\TeamSide\UnknownSidePolicy\ThrowOutOfBoundsExceptionPolicy()
);

$apiHandler = new LolAPI\Handler\CURL\Handler();

function processQueryResult(LolAPI\Service\Game\Ver1_3\Recent\QueryResult $queryResult)
{
    $dto = $queryResult->getRecentGamesDTO();

    println(sprintf("Recent games for summoner (%d)", $dto->getSummonerId()));

    foreach($dto->getGames() as $gameDTO) {
        println(sprintf("ChampionId: %s", $gameDTO->getChampionId()), 1);
        println(sprintf("CreateDate: %s", $gameDTO->getCreateDate()), 1);
        println(sprintf("GameId: %s", $gameDTO->getGameId()), 1);
        println(sprintf("GameMode/Code: %s", $gameDTO->getGameMode()->getCode()), 1);
        println(sprintf("GameType/Code: %s", $gameDTO->getGameType()->getCode()), 1);
        println(sprintf("SubType/Code: %s", $gameDTO->getSubType()->getCode()), 1);
        println(sprintf("SubType/Description: %s", $gameDTO->getSubType()->getDescription()), 1);
        println(sprintf("MapId/Id: %s", $gameDTO->getMapId()->getId()), 1);
        println(sprintf("MapId/Name: %s", $gameDTO->getMapId()->getName()), 1);
        println(sprintf("MapId/Notes: %s", $gameDTO->getMapId()->getNotes()), 1);
        println(sprintf("Side/Id: %s", $gameDTO->getSide()->getId()), 1);
        println(sprintf("Side/Color: %s", $gameDTO->getSide()->getColor()), 1);
        println(sprintf("IsInvalid: %s", ($gameDTO->isInvalid() ? 'true' : 'false')), 1);
        println(sprintf("IpEarned : %s", $gameDTO->getIpEarned()), 1);
        println(sprintf("Level: %s", $gameDTO->getLevel()), 1);
        println(sprintf("Spell1Id: %s", $gameDTO->getSpell1()), 1);
        println(sprintf("Spell2Id: %s", $gameDTO->getSpell2()), 1);

        if($gameDTO->hasFellowPlayers()) {
            println("Fellow Players", 1);

            foreach($gameDTO->getFellowPlayers() as $fellowPlayer) {
                println(sprintf("ChampionId: %d", $fellowPlayer->getChampionId()), 2);
                println(sprintf("SummonerId: %d", $fellowPlayer->getSummonerId()), 2);
                println(sprintf("TeamId: %d", $fellowPlayer->getTeamId()), 2);
                println(" ", 2);
            }
        }
        println(" ", 1);
    }
}

$service = new LolAPI\Service\Game\Ver1_3\Recent\Service(
    $apiHandler,
    $teamSideFactory,
    $gameTypeFactory,
    $gameModeFactory,
    $subTypesFactory,
    $mapIdFactory
);
$request = new LolAPI\Service\Game\Ver1_3\Recent\Request($apiKey, $region, $config['summonerId']);
$query = $service->createQuery($request);
$queryResult = $query->execute();

processQueryResult($queryResult);
