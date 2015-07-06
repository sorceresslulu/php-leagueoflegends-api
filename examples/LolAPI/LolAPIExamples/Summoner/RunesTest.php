<?php
namespace LolAPIExamples\Summoner;

use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\Summoner\Ver1_4\Runes\DTO\RunesDTO;
use LolAPI\Service\Summoner\Ver1_4\Runes\DTOBuilder;
use LolAPI\Service\Summoner\Ver1_4\Runes\Request;
use LolAPI\Service\Summoner\Ver1_4\Runes\Service;
use LolAPIExamples\ExampleTest;

class RunesTest extends ExampleTest
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

    private function processResult(RunesDTO $dto)
    {
        foreach ($dto->getRunePagesDTOs() as $runePagesDTO) {
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
    }
}