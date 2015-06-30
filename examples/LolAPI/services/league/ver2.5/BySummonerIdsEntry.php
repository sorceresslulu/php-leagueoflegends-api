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
    $service = new LolAPI\Service\League\Ver2_5\BySummonerIdsEntry\Service(
        $apiHandler,
        $leagueQueueTypeFactory,
        $leagueTierFactory
    );

    $request = new LolAPI\Service\League\Ver2_5\BySummonerIdsEntry\Request(
        $apiKey, $regionEndpoint, array($config['summonerId'], $config['summonerIdWithTeam'])
    );
    $query = $service->createQuery($request);
    $queryResult = $query->execute();

    $processQueryResult = function(LolAPI\Service\League\Ver2_5\BySummonerIdsEntry\QueryResult $queryResult)
    {
        foreach ($queryResult->getSummonerDTOs() as $summonerDTO) {
            println(sprintf("Summoner DTO (%d)", $summonerDTO->getSummonerId()));

            foreach ($summonerDTO->getLeaguePlayerDTOs() as $leagueDTO) {
                printLeaguePlayerDTO($leagueDTO);
            }

            foreach ($summonerDTO->getLeagueTeamDTOs() as $leagueDTO) {
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