<?php
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

$config = getConfig();
$apiKey = new \LolAPI\APIKey($config['apiKey']);
$region = \LolAPI\RegionFactory::getRegionByCode($config['region']);

$apiHandler = new LolAPI\Handler\CURL\Handler();
$service = new LolAPI\Service\Summoner\Ver1_4\Name\Service($apiHandler);
$request = new \LolAPI\Service\Summoner\Ver1_4\Name\Request(
    $apiKey, $region, array($config['summonerId'])
);

$query = $service->createQuery($request);
$queryResult = $query->execute();

function processQueryResult(\LolAPI\Service\Summoner\Ver1_4\Name\QueryResult $queryResult) {
    foreach($queryResult->getSummonerDTOs() as $summonerDTO) {
        println("Summoner DTO:");
        println("ID: ".$summonerDTO->getSummonerId(), 1);
        println("Name: ". $summonerDTO->getSummonerName(), 1);
    }
}

processQueryResult($queryResult);