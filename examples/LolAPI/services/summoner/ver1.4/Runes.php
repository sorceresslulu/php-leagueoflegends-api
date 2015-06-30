<?php
$testFunc = function()
{
    $config = getConfig();
    $apiKey = new \LolAPI\APIKey($config['apiKey']);
    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\Summoner\Ver1_4\Runes\Service($apiHandler);
    $request = new \LolAPI\Service\Summoner\Ver1_4\Runes\Request(
        $apiKey, $regionEndpoint, array($config['summonerId'])
    );

    $query = $service->createQuery($request);
    $queryResult = $query->execute();

    $processQueryResult = function(\LolAPI\Service\Summoner\Ver1_4\Runes\QueryResult $queryResult)
    {
        foreach ($queryResult->getRunePagesDTOs() as $runePagesDTO) {
            println(sprintf("Summoner (%d)", $runePagesDTO->getSummonerId()));

            foreach ($runePagesDTO->getPages() as $page) {
                println("Id: " . $page->getId(), 1);
                println("Current: " . ($page->isCurrent() ? 'true' : 'false'), 1);
                println("Name: " . $page->getName(), 1);

                if ($page->hasSlots()) {
                    foreach ($page->getSlots() as $slot) {
                        println(sprintf("Slot: RuneId(%d), RuneSlotId(%d)", $slot->getRuneId(), $slot->getRuneSlotId()), 2);
                    }
                } else {
                    println("No slots", 1);
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