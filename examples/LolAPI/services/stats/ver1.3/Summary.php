<?php
use LolAPI\Service\Stats\Ver1_3\Summary\DTOBuilder;

$testFunc = function()
{
    $config = getConfig();
    $apiKey = new \LolAPI\APIKey($config['apiKey']);

    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);

    $playerStatSummaryTypeFactory = new \LolAPI\GameConstants\PlayerStatSummaryType\PlayerStatSummaryTypeFactory(
        new \LolAPI\GameConstants\PlayerStatSummaryType\UnknownPSSPolicyInterface\ThrowOutOfBoundsExceptionPolicy()
    );

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\Stats\Ver1_3\Summary\Service($apiHandler);


    $request = new LolAPI\Service\Stats\Ver1_3\Summary\Request($apiKey, $regionEndpoint, $config['summonerId']);
    $query = $service->createQuery($request);
    $response = $query->execute();

    $dtoBuilder = new DTOBuilder($playerStatSummaryTypeFactory);
    $dto = $dtoBuilder->buildDTO($response);

    $processQueryResult = function(LolAPI\Service\Stats\Ver1_3\Summary\DTO\PlayerStatsSummaryListDto $dto)
    {
        println(sprintf("SummonerID: %s", $dto->getSummonerId()));

        foreach ($dto->getPlayerStatSummaries() as $playerStatSummary) {
            println(sprintf("Type: %s", $playerStatSummary->getPlayerStatSummaryType()->getStringCode()), 1);
            println(sprintf("TypeDescription: %s", $playerStatSummary->getPlayerStatSummaryType()->getDescription()), 1);

            if ($playerStatSummary->isLossesSpecified()) {
                println(sprintf("Losses: %s", $playerStatSummary->getLosses()), 1);
            }

            println(sprintf("Wins: %s", $playerStatSummary->getWins()), 1);
            println(sprintf("Modify Date: %s", $playerStatSummary->getModifyDate()), 1);
            println("Stats:", 1);

            foreach ($playerStatSummary->getAggregatedStats()->getAggregatedStats() as $statName => $statValue) {
                println(sprintf("%s: %s", $statName, $statValue), 2);
            }

            println("----", 1);
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