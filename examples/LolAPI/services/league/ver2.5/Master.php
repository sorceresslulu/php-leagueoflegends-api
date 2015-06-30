<?php
$testFunc = function()
{
    $config = getConfig();
    $apiKey = new \LolAPI\APIKey($config['apiKey']);
    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);

    $leagueQueueTypeFactory = new \LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeFactory(
        new LolAPI\GameConstants\LeagueQueueType\UnknownLQTypePolicy\ThrowsOutOfBoundsExceptionPolicy()
    );

    $leagueTierFactory = new \LolAPI\GameConstants\LeagueTier\LeagueTierFactory(
        new LolAPI\GameConstants\LeagueTier\UnknownTierPolicy\ThrowsOutOfBoundsExceptionPolicy()
    );

    $processQueryResult = function(LolAPI\Service\League\Ver2_5\Master\QueryResult $queryResult)
    {
        if ($queryResult->getLeagueQueueType()->forSolo()) {
            printLeaguePlayerDTO($queryResult->getMasterLeaguePlayersDTO());
        } else {
            printLeagueTeamDTO($queryResult->getMasterLeagueTeamsDTO());
        }
    };

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\League\Ver2_5\Master\Service(
        $apiHandler,
        $leagueQueueTypeFactory,
        $leagueTierFactory
    );

    $request = new LolAPI\Service\League\Ver2_5\Master\Request(
        $apiKey,
        $regionEndpoint,
        $leagueQueueTypeFactory->createLQTypeByStringCode(\LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface::LQT_RANKED_SOLO_5x5)
    );

    $query = $service->createQuery($request);
    $queryResult = $query->execute();

    $processQueryResult($queryResult);


    $request = new LolAPI\Service\League\Ver2_5\Master\Request(
        $apiKey,
        $regionEndpoint,
        $leagueQueueTypeFactory->createLQTypeByStringCode(\LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface::LQT_RANKED_TEAM_3x3)
    );

    $query = $service->createQuery($request);
    $queryResult = $query->execute();

    $processQueryResult($queryResult);
};

if (!count(debug_backtrace())) {
    require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

    $testFunc();
}else{
    return $testFunc;
}