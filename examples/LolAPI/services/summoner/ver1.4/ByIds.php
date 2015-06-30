<?php
$testFunc = function()
{
    $config = getConfig();
    $apiKey = new \LolAPI\APIKey($config['apiKey']);
    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\Summoner\Ver1_4\ByIds\Service($apiHandler);
    $request = new \LolAPI\Service\Summoner\Ver1_4\ByIds\Request(
        $apiKey,
        $regionEndpoint,
        array($config['summonerId'])
    );

    $query = $service->createQuery($request);
    $queryResult = $query->execute();

    $processQueryResult = function(\LolAPI\Service\Summoner\Ver1_4\ByIds\QueryResult $queryResult)
    {
        foreach ($queryResult->getSummonerDTOs() as $summonerDTO) {
            println("Summoner DTO");
            println(sprintf("ID: %d", $summonerDTO->getId()), 1);
            println(sprintf("Name: %s", $summonerDTO->getName()), 1);
            println(sprintf("ProfileIconId: %d", $summonerDTO->getProfileIconId()), 1);
            println(sprintf("RevisionDate: %d", $summonerDTO->getRevisionDate()), 1);
            println(sprintf("SummonerLevel: %d", $summonerDTO->getSummonerLevel()), 1);
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