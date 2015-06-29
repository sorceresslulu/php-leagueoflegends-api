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
$service = new LolAPI\Service\League\Ver2_5\BySummonerIdsEntry\Service(
    $apiHandler,
    $leagueQueueTypeFactory,
    $leagueTierFactory
);

$request = new LolAPI\Service\League\Ver2_5\BySummonerIdsEntry\Request(
    $apiKey, $region, array($config['summonerId'], $config['summonerIdWithTeam'])
);
$query = $service->createQuery($request);
$queryResult = $query->execute();

function processQueryResult(LolAPI\Service\League\Ver2_5\BySummonerIdsEntry\QueryResult $queryResult) {
    foreach($queryResult->getSummonerDTOs() as $summonerDTO) {
        println(sprintf("Summoner DTO (%d)", $summonerDTO->getSummonerId()));

        foreach($summonerDTO->getLeaguePlayerDTOs() as $leagueDTO) {
            printLeaguePlayerDTO($leagueDTO);
        }

        foreach($summonerDTO->getLeagueTeamDTOs() as $leagueDTO) {
            printLeagueTeamDTO($leagueDTO);
        }
    }
}

processQueryResult($queryResult);