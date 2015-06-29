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

function processQueryResult(LolAPI\Service\League\Ver2_5\Challenger\QueryResult $queryResult) {
    if($queryResult->getLeagueQueueType()->forSolo()) {
        printLeaguePlayerDTO($queryResult->getChallengerLeaguePlayersDTO());
    }else{
        printLeagueTeamDTO($queryResult->getChallengerLeagueTeamsDTO());
    }
}

$apiHandler = new LolAPI\Handler\CURL\Handler();
$service = new LolAPI\Service\League\Ver2_5\Challenger\Service(
    $apiHandler,
    $leagueQueueTypeFactory,
    $leagueTierFactory
);

$request = new LolAPI\Service\League\Ver2_5\Challenger\Request(
    $apiKey,
    $region,
    $leagueQueueTypeFactory->createLQTypeByStringCode(\LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface::LQT_RANKED_SOLO_5x5)
);

$query = $service->createQuery($request);
$queryResult = $query->execute();

processQueryResult($queryResult);


$request = new LolAPI\Service\League\Ver2_5\Challenger\Request(
    $apiKey,
    $region,
    $leagueQueueTypeFactory->createLQTypeByStringCode(\LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface::LQT_RANKED_TEAM_3x3)
);

$query = $service->createQuery($request);
$queryResult = $query->execute();

processQueryResult($queryResult);