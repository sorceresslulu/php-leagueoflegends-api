<?php
use LolAPI\Service\Stats\Ver1_3\BySummoner\DTOBuilder;

$testFunc = function()
{
    $config = getConfig();
    $apiKey = new \LolAPI\APIKey($config['apiKey']);
    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\Stats\Ver1_3\BySummoner\Service($apiHandler);

    $request = new LolAPI\Service\Stats\Ver1_3\BySummoner\Request($apiKey, $regionEndpoint, $config['summonerId']);
    $query = $service->createQuery($request);
    $response = $query->execute();

    $dtoBuilder = new DTOBuilder();
    $dto = $dtoBuilder->buildDTO($response);

    $processQueryResult = function(LolAPI\Service\Stats\Ver1_3\BySummoner\DTO\RankedStatsDto $dto)
    {
        println(sprintf("SummonerID: %d", $dto->getSummonerId()));
        println(sprintf("ModifyDate: %d", $dto->getModifyDate()));

        foreach ($dto->getChampions() as $champion) {
            println(sprintf("ChampionId: %s", $champion->getChampionId()), 1);
            println("Stats", 1);

            foreach ($champion->getStats()->getAggregatedStats() as $statName => $statValue) {
                println(sprintf("%s: %s", $statName, $statValue), 2);
            }

            println("----");
        }
    };

    $processQueryResult($dto);
};

if (!count(debug_backtrace())) {
    require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

    $testFunc();
}else{
    return $testFunc;
}