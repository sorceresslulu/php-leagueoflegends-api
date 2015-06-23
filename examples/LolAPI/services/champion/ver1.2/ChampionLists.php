<?php
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

$config = getConfig();
$apiKey = new \LolAPI\APIKey($config['apiKey']);
$region = \LolAPI\RegionFactory::getRegionByStringCode($config['region']);

$apiHandler = new LolAPI\Handler\CURL\Handler();
$service = new LolAPI\Service\Champion\Ver1_2\ChampionList\Service($apiHandler);
$request = new LolAPI\Service\Champion\Ver1_2\ChampionList\Request($apiKey, $region, true);

function processRequest(LolAPI\Service\Champion\Ver1_2\ChampionList\QueryResult $response) {
    foreach($response->getChampionDTOs() as $championDTO) {
        println(sprintf("Champion #%d", $championDTO->getId()));
        println(sprintf("Active: %s", ($championDTO->isActive() ? 'true' : 'false')), 1);
        println(sprintf("BotEnabled: %s", ($championDTO->isBotEnabled() ? 'true' : 'false')), 1);
        println(sprintf("BotMmEnabled: %s", ($championDTO->isBotMmEnabled() ? 'true' : 'false')), 1);
        println(sprintf("FreeToPlay: %s", ($championDTO->isFreeToPlay() ? 'true' : 'false')), 1);
        println(sprintf("RankedPlayEnabled: %s", ($championDTO->isRankedPlayEnabled() ? 'true' : 'false')), 1);
    }
}

$query = $service->createQuery($request);
$queryResult = $query->execute();

processRequest($queryResult);