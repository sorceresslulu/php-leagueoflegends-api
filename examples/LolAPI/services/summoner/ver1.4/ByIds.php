<?php
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

$config = getConfig();

$apiHandler = new LolAPI\Handler\CURL\Handler();
$service = new LolAPI\Service\Summoner\Ver1_4\ByIds\Service($apiHandler);

$apiKey = new \LolAPI\APIKey($config['apiKey']);

$region = \LolAPI\RegionFactory::getRegionByCode($config['region']);

$request = new \LolAPI\Service\Summoner\Ver1_4\ByIds\Request(
    $apiKey,
    $region,
    array($config['summonerId'])
);

$response = $service->fetch($request);

foreach($response->getSummonerDTOs() as $summonerDTO) {
    echo <<<RESPONSE
Summoner DTO:
---
    Id: {$summonerDTO->getId()}
    Name: {$summonerDTO->getName()}
    ProfileIconId: {$summonerDTO->getProfileIconId()}
    RevisionDate: {$summonerDTO->getRevisionDate()}
    SummonerLevel: {$summonerDTO->getSummonerLevel()}
---

RESPONSE;
}