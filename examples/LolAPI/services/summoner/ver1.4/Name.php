<?php
$testFunc = function()
{
    $config = getConfig();
    $apiKey = new \LolAPI\APIKey($config['apiKey']);
    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\Summoner\Ver1_4\Name\Service($apiHandler);
    $request = new \LolAPI\Service\Summoner\Ver1_4\Name\Request(
        $apiKey, $regionEndpoint, array($config['summonerId'])
    );

    $query = $service->createQuery($request);
    $queryResult = $query->execute();

    $processQueryResult = function(\LolAPI\Service\Summoner\Ver1_4\Name\QueryResult $queryResult)
    {
        foreach ($queryResult->getSummonerDTOs() as $summonerDTO) {
            println("Summoner DTO:");
            println("ID: " . $summonerDTO->getSummonerId(), 1);
            println("Name: " . $summonerDTO->getSummonerName(), 1);
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