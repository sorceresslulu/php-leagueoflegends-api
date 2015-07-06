<?php
namespace LolAPIExamples\LolStatus;

use LolAPI\Service\LolStatus\Ver1_0\Shards\DTO\ShardsDTO;
use LolAPI\Service\LolStatus\Ver1_0\Shards\DTOBuilder;
use LolAPI\Service\LolStatus\Ver1_0\Shards\Service;
use LolAPIExamples\ExampleTest;

class ShardsTest extends ExampleTest
{
    public function testExample()
    {
        $service = new Service($this->getLolAPIHandler());

        $query = $service->createQuery();
        $response = $query->execute();

        $dtoBuilder = new DTOBuilder();
        $dto = $dtoBuilder->buildDTO($response);

        if($this->isOutputEnabled()) {
            $this->processResult($dto);
        }
    }

    private function processResult(ShardsDTO $dto)
    {
        foreach ($dto->getShardDTOs() as $shard) {
            println("Shard:");
            println(sprintf("Name: %s", $shard->getName()), 1);
            println(sprintf("Hostname: %s", $shard->getHostname()), 1);
            println(sprintf("Locales: %s", implode(',', $shard->getLocales())), 1);
            println(sprintf("RegionTag: %s", $shard->getRegionTag()), 1);
            println(sprintf("Slug: %s", $shard->getSlug()), 1);
        }
    }
}