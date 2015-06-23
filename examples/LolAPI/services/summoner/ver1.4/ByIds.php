<?php
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

$config = getConfig();
$apiKey = new \LolAPI\APIKey($config['apiKey']);
$regionFactory = new \LolAPI\Region\RegionFactory(new \LolAPI\Region\UnknownRegionPolicy\ThrowUnknownRegionExceptionPolicy());
$region = $regionFactory->getRegionByStringCode($config['region']);

$apiHandler = new LolAPI\Handler\CURL\Handler();
$service = new LolAPI\Service\Summoner\Ver1_4\ByIds\Service($apiHandler);
$request = new \LolAPI\Service\Summoner\Ver1_4\ByIds\Request(
    $apiKey,
    $region,
    array($config['summonerId'])
);

$query = $service->createQuery($request);
$queryResult = $query->execute();

function processQueryResult(\LolAPI\Service\Summoner\Ver1_4\ByIds\QueryResult $queryResult) {
    foreach($queryResult->getSummonerDTOs() as $summonerDTO) {
        println("Summoner DTO");
        println(sprintf("ID: %d", $summonerDTO->getId()), 1);
        println(sprintf("Name: %s", $summonerDTO->getName()), 1);
        println(sprintf("ProfileIconId: %d", $summonerDTO->getProfileIconId()), 1);
        println(sprintf("RevisionDate: %d", $summonerDTO->getRevisionDate()), 1);
        println(sprintf("SummonerLevel: %d", $summonerDTO->getSummonerLevel()), 1);
    }
}

processQueryResult($queryResult);