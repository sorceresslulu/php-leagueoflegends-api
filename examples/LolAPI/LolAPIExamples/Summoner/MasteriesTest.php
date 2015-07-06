<?php
namespace LolAPIExamples\Summoner;

use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\Summoner\Ver1_4\Masteries\DTO\MasteriesDTO;
use LolAPI\Service\Summoner\Ver1_4\Masteries\DTOBuilder;
use LolAPI\Service\Summoner\Ver1_4\Masteries\Request;
use LolAPI\Service\Summoner\Ver1_4\Masteries\Service;
use LolAPIExamples\ExampleTest;

class MasteriesTest extends ExampleTest
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

    private function processResult(MasteriesDTO $dto)
    {
        foreach ($dto->getMasteryPagesDTOs() as $masteryPages) {
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
    }
}