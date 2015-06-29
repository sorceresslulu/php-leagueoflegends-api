<?php
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';
require_once __DIR__ . '/_lib.php';

$config = getConfig();
$apiKey = new \LolAPI\APIKey($config['apiKey']);
$regionFactory = new \LolAPI\Region\RegionFactory(new \LolAPI\Region\UnknownRegionPolicy\ThrowUnknownRegionExceptionPolicy());
$region = $regionFactory->getRegionByStringCode($config['region']);

$leagueQueueTypeFactory = new \LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeFactory(
    new LolAPI\GameConstants\LeagueQueueType\UnknownLQTypePolicy\ThrowsOutOfBoundsExceptionPolicy()
);

$leagueTierFactory = new \LolAPI\GameConstants\LeagueTier\LeagueTierFactory(
    new LolAPI\GameConstants\LeagueTier\UnknownTierPolicy\ThrowsOutOfBoundsExceptionPolicy()
);

$apiHandler = new LolAPI\Handler\CURL\Handler();
$service = new LolAPI\Service\League\Ver2_5\ByTeamIds\Service(
    $apiHandler,
    $leagueQueueTypeFactory,
    $leagueTierFactory
);

$request = new LolAPI\Service\League\Ver2_5\ByTeamIds\Request(
    $apiKey, $region, array($config['teamId'])
);
$query = $service->createQuery($request);
$queryResult = $query->execute();

function processQueryResult(LolAPI\Service\League\Ver2_5\ByTeamIds\QueryResult $queryResult) {
    foreach($queryResult->getTeamDTOs() as $teamDTO) {
        println(sprintf("Team DTO (%s)", $teamDTO->getTeamId()));

        foreach($teamDTO->getLeagueTeamDTOs() as $leagueDTO) {
            printLeagueTeamDTO($leagueDTO);
        }
    }
}

processQueryResult($queryResult);