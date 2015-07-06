<?php
namespace LolAPIExamples\Stats;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Stats\Ver1_3\BySummoner\DTO\RankedStatsDto;
use LolAPI\Service\Stats\Ver1_3\BySummoner\DTOBuilder;
use LolAPI\Service\Stats\Ver1_3\BySummoner\Request;
use LolAPI\Service\Stats\Ver1_3\BySummoner\Service;
use LolAPIExamples\ExampleTest;

class BySummonerTest extends ExampleTest
{
    public function testExample()
    {
        $config = $this->getConfig();
        $service = new Service($this->getLolAPIHandler());

        $request = new Request($this->getApiKey(), $this->getRegionalEndpoint(), $config['summonerId']);
        $query = $service->createQuery($request);

        $response = $query->execute();

        if($this->isOutputEnabled()) {
            $this->processResult($this->buildDTO($response));
        }
    }

    private function buildDTO(ResponseInterface $response)
    {
        $dtoBuilder = new DTOBuilder();

        return $dtoBuilder->buildDTO($response);
    }

    private function processResult(RankedStatsDto $dto)
    {
        println(sprintf("SummonerID: %d", $dto->getSummonerId()));
        println(sprintf("ModifyDate: %d", $dto->getModifyDate()));

        foreach ($dto->getChampions() as $champion) {
            println(sprintf("ChampionId: %s", $champion->getChampionId()), 1);
            println("Stats", 1);

            foreach ($champion->getStats()->getAggregatedStats() as $statName => $statValue) {
                println(sprintf("%s: %s", $statName, $statValue), 2);
            }

            println("----");
        }
    }
}