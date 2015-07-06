<?php
namespace LolAPIExamples\Summoner;

use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\Summoner\Ver1_4\ByIds\DTO\ByIdsDTO;
use LolAPI\Service\Summoner\Ver1_4\ByIds\DTOBuilder;
use LolAPI\Service\Summoner\Ver1_4\ByIds\Request;
use LolAPI\Service\Summoner\Ver1_4\ByIds\Service;
use LolAPIExamples\ExampleTest;

class ByIdsTest extends ExampleTest
{
    public function testExample()
    {
        $config = $this->getConfig();
        $service = new Service($this->getLolAPIHandler());

        $request = new Request(
            $this->getApiKey(),
            $this->getRegionalEndpoint(),
            array($config['summonerId'])
        );

        $query = $service->createQuery($request);
        $response = $query->execute();

        if($this->isOutputEnabled()) {
            $this->processResult($this->buildDTO($response));
        }
    }

    private function buildDTO(LolAPIResponseInterface $response)
    {
        $dtoBuilder = new DTOBuilder();

        return $dtoBuilder->buildDTO($response);
    }

    private function processResult(ByIdsDTO $dto)
    {
        foreach ($dto->getSummonerDTOs() as $summonerDTO) {
            println("Summoner DTO");
            println(sprintf("ID: %d", $summonerDTO->getId()), 1);
            println(sprintf("Name: %s", $summonerDTO->getName()), 1);
            println(sprintf("ProfileIconId: %d", $summonerDTO->getProfileIconId()), 1);
            println(sprintf("RevisionDate: %d", $summonerDTO->getRevisionDate()), 1);
            println(sprintf("SummonerLevel: %d", $summonerDTO->getSummonerLevel()), 1);
        }
    }
}