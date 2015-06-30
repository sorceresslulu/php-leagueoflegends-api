<?php
$testFunc = function()
{
    $config = getConfig();
    $apiKey = new \LolAPI\APIKey($config['apiKey']);
    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\Stats\Ver1_3\BySummoner\Service($apiHandler);

    $processQueryResult = function(LolAPI\Service\Stats\Ver1_3\BySummoner\QueryResult $queryResult)
    {
        println(sprintf("SummonerID: %d", $queryResult->getRankedStatsDTO()->getSummonerId()));
        println(sprintf("ModifyDate: %d", $queryResult->getRankedStatsDTO()->getModifyDate()));

        foreach ($queryResult->getRankedStatsDTO()->getChampions() as $champion) {
            println(sprintf("ChampionId: %s", $champion->getChampionId()), 1);
            println("Stats", 1);

            foreach ($champion->getStats()->getAggregatedStats() as $statName => $statValue) {
                println(sprintf("%s: %s", $statName, $statValue), 2);
            }

            println("----");
        }
    };

    $request = new LolAPI\Service\Stats\Ver1_3\BySummoner\Request($apiKey, $regionEndpoint, $config['summonerId']);
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