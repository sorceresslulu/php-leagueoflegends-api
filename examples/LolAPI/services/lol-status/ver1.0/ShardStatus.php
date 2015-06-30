<?php
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTOBuilder;

$testFunc = function()
{
    $config = getConfig();
    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\LolStatus\Ver1_0\ShardStatus\Service($apiHandler);

    $request = new LolAPI\Service\LolStatus\Ver1_0\ShardStatus\Request($regionEndpoint);
    $query = $service->createQuery($request);
    $response = $query->execute();

    $dtoBuilder = new DTOBuilder();
    $dto = $dtoBuilder->buildDTO($response);

    $processQueryResult = function(\LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\ShardStatus $shardStatus) {
        println("Shard status");
        println(sprintf("Name: %s", $shardStatus->getName()), 1);
        println(sprintf("Hostname: %s", $shardStatus->getHostname()), 1);
        println(sprintf("Locales: %s", implode(', ', $shardStatus->getLocales())), 1);
        println(sprintf("RegionTag: %s", $shardStatus->getRegionTag()), 1);
        println(sprintf("Slug: %s", $shardStatus->getSlug()), 1);
        println("Services:", 1);

        foreach ($shardStatus->getServices() as $service) {
            println(sprintf("Name: %s", $service->getName()), 2);
            println(sprintf("Slug: %s", $service->getSlug()), 2);
            println(sprintf("Status: %s", $service->getStatus()->getCode()), 2);

            if ($service->hasIncidents()) {
                println("Incidents: ", 2);

                foreach ($service->getIncidents() as $incident) {
                    println(sprintf("ID: %s", $incident->getId()), 3);
                    println(sprintf("CreatedAt: %s", $incident->getCreatedAt()), 3);
                    println(sprintf("Active: %s", ($incident->isActive() ? 'true' : 'false')), 3);

                    if ($incident->hasUpdates()) {
                        println("Updates: ", 3);

                        foreach ($incident->getUpdates() as $update) {
                            println(sprintf("Id: %s", $update->getId()), 4);
                            println(sprintf("Author: %s", $update->getAuthor()), 4);
                            println(sprintf("CreatedAt: %s", $update->getCreatedAt()), 4);
                            println(sprintf("UpdatedAt: %s", $update->getUpdatedAt()), 4);
                            println(sprintf("Severity: %s", $update->getSeverity()->getCode()), 4);

                            if ($update->hasTranslations()) {
                                println("Translations", 4);

                                foreach ($update->getTranslations() as $translation) {
                                    println(sprintf("Locale: %s", $translation->getLocale()), 5);
                                    println(sprintf("UpdatedAt: %s", $translation->getUpdatedAt()), 5);
                                    println(sprintf("Content: %s", $translation->getContent()), 5);
                                    println('---', 5);
                                }
                            }
                        }
                    }
                }
            }

            println(' ', 2);
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