<?php
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

$config = getConfig();
$apiKey = new \LolAPI\APIKey($config['apiKey']);
$regionFactory = new \LolAPI\Region\RegionFactory(new \LolAPI\Region\UnknownRegionPolicy\ThrowUnknownRegionExceptionPolicy());
$region = $regionFactory->getRegionByStringCode($config['region']);

$apiHandler = new LolAPI\Handler\CURL\Handler();
$service = new LolAPI\Service\LolStatus\Ver1_0\Shards\Service($apiHandler);

function processQueryResult(LolAPI\Service\LolStatus\Ver1_0\Shards\QueryResult $queryResult) {
    foreach($queryResult->getShards() as $shard) {
        println("Shard:");
        println(sprintf("Name: %s", $shard->getName() ), 1);
        println(sprintf("Hostname: %s", $shard->getHostname() ), 1);
        println(sprintf("Locales: %s", implode(',', $shard->getLocales())), 1);
        println(sprintf("RegionTag: %s", $shard->getRegionTag() ), 1);
        println(sprintf("Slug: %s", $shard->getSlug() ), 1);
    }
}

$query = $service->createQuery();
$queryResult = $query->execute();

processQueryResult($queryResult);