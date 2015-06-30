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

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\League\Ver2_5\ByTeamIds\Service(
        $apiHandler,
        $leagueQueueTypeFactory,
        $leagueTierFactory
    );

    $request = new LolAPI\Service\League\Ver2_5\ByTeamIds\Request(
        $apiKey, $regionEndpoint, array($config['teamId'])
    );
    $query = $service->createQuery($request);
    $queryResult = $query->execute();

    $processQueryResult = function(LolAPI\Service\League\Ver2_5\ByTeamIds\QueryResult $queryResult)
    {
        foreach ($queryResult->getTeamDTOs() as $teamDTO) {
            println(sprintf("Team DTO (%s)", $teamDTO->getTeamId()));

            foreach ($teamDTO->getLeagueTeamDTOs() as $leagueDTO) {
                printLeagueTeamDTO($leagueDTO);
            }
        }
    };

    $processQueryResult($queryResult);
};

if (!count(debug_backtrace())) {
    require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

    $testFunc();
}else{
    return $testFunc;
}