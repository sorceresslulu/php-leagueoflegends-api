<?php
$testFunc = function()
{
    $config = getConfig();
    $apiKey = new \LolAPI\APIKey($config['apiKey']);
    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\Summoner\Ver1_4\Masteries\Service($apiHandler);
    $request = new \LolAPI\Service\Summoner\Ver1_4\Masteries\Request(
        $apiKey,
        $regionEndpoint,
        array($config['summonerId'])
    );

    $query = $service->createQuery($request);
    $queryResult = $query->execute();

    $processQueryResult = function(\LolAPI\Service\Summoner\Ver1_4\Masteries\QueryResult $queryResult)
    {
        foreach ($queryResult->getMasteryPagesDTOs() as $masteryPages) {
            println(sprintf("Mastery for summoner: %s", $masteryPages->getSummonerId()));

            foreach ($masteryPages->getPages() as $masteryPage) {
                println("Id: " . $masteryPage->getId(), 1);
                println("Name: " . $masteryPage->getName(), 1);
                println("Current: " . ($masteryPage->isCurrent() ? 'true' : 'false'), 1);

                if ($masteryPage->hasMasteries()) {
                    foreach ($masteryPage->getMasteries() as $mastery) {
                        println(sprintf("Mastery: ID(%d), RANK(%d)", $mastery->getId(), $mastery->getRank()), 2);
                    }
                } else {
                    println("No masteries available", 1);
                }
            }
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