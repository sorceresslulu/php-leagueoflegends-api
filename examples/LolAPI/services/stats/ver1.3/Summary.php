<?php
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

$config = getConfig();
$apiKey = new \LolAPI\APIKey($config['apiKey']);
$regionFactory = new \LolAPI\Region\RegionFactory(new \LolAPI\Region\UnknownRegionPolicy\ThrowUnknownRegionExceptionPolicy());
$region = $regionFactory->getRegionByStringCode($config['region']);
$playerStatSummaryTypeFactory = new \LolAPI\GameConstants\PlayerStatSummaryType\PlayerStatSummaryTypeFactory(
    new \LolAPI\GameConstants\PlayerStatSummaryType\UnknownPSSPolicyInterface\ThrowOutOfBoundsExceptionPolicy()
);

$apiHandler = new LolAPI\Handler\CURL\Handler();
$service = new LolAPI\Service\Stats\Ver1_3\Summary\Service($apiHandler, $playerStatSummaryTypeFactory);

function processQueryResult(LolAPI\Service\Stats\Ver1_3\Summary\QueryResult $queryResult)
{
    $dto = $queryResult->getPlayerStatsSummaryListDto();
    println(sprintf("SummonerID: %s", $dto->getSummonerId()));

    foreach($dto->getPlayerStatSummaries() as $playerStatSummary) {
        println(sprintf("Type: %s", $playerStatSummary->getPlayerStatSummaryType()->getStringCode()), 1);
        println(sprintf("TypeDescription: %s", $playerStatSummary->getPlayerStatSummaryType()->getDescription()), 1);

        if($playerStatSummary->isLossesSpecified()) {
            println(sprintf("Losses: %s", $playerStatSummary->getLosses()), 1);
        }

        println(sprintf("Wins: %s", $playerStatSummary->getWins()), 1);
        println(sprintf("Modify Date: %s", $playerStatSummary->getModifyDate()), 1);
        println("Stats:", 1);

        foreach($playerStatSummary->getAggregatedStats()->getAggregatedStats() as $statName => $statValue) {
            println(sprintf("%s: %s", $statName, $statValue), 2);
        }

        println("----", 1);
    }
}

$request = new LolAPI\Service\Stats\Ver1_3\Summary\Request($apiKey, $region, $config['summonerId']);
$query = $service->createQuery($request);
$queryResult = $query->execute();

processQueryResult($queryResult);