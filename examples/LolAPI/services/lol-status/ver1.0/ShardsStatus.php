<?php
use LolAPI\Service\LolStatus\Ver1_0\Shards\DTOBuilder;

$testFunc = function()
{
    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\LolStatus\Ver1_0\Shards\Service($apiHandler);

    $query = $service->createQuery();
    $response = $query->execute();

    $dtoBuilder = new DTOBuilder();
    $dto = $dtoBuilder->buildDTO($response);

    $processQueryResult = function(LolAPI\Service\LolStatus\Ver1_0\Shards\DTO\ShardsDTO $dto)
    {
        foreach ($dto->getShardDTOs() as $shard) {
            println("Shard:");
            println(sprintf("Name: %s", $shard->getName()), 1);
            println(sprintf("Hostname: %s", $shard->getHostname()), 1);
            println(sprintf("Locales: %s", implode(',', $shard->getLocales())), 1);
            println(sprintf("RegionTag: %s", $shard->getRegionTag()), 1);
            println(sprintf("Slug: %s", $shard->getSlug()), 1);
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