<?php
namespace LolAPIExamples\Champion;

use LolAPI\Service\Champion\Ver1_2\Champion\DTO\ChampionDTO;
use LolAPI\Service\Champion\Ver1_2\Champion\DTOBuilder;
use LolAPI\Service\Champion\Ver1_2\Champion\Request;
use LolAPI\Service\Champion\Ver1_2\Champion\Service;
use LolAPIExamples\ExampleTest;

class ChampionTest extends ExampleTest
{
    public function testExample() {
        $service = new Service($this->getLolAPIHandler());
        $request = new Request($this->getApiKey(), $this->getRegionalEndpoint(), 1);

        $query = $service->createQuery($request);
        $response = $query->execute();

        $dtoBuilder = new DTOBuilder();
        $dto = $dtoBuilder->buildDTO($response);

        if($this->isOutputEnabled()) {
            $this->processResult($dto);
        }
    }

    private function processResult(ChampionDTO $championDTO) {
        println(sprintf("Champion #%d", $championDTO->getId()));
        println(sprintf("Active: %s", ($championDTO->isActive() ? 'true' : 'false')), 1);
        println(sprintf("BotEnabled: %s", ($championDTO->isBotEnabled() ? 'true' : 'false')), 1);
        println(sprintf("BotMmEnabled: %s", ($championDTO->isBotMmEnabled() ? 'true' : 'false')), 1);
        println(sprintf("FreeToPlay: %s", ($championDTO->isFreeToPlay() ? 'true' : 'false')), 1);
        println(sprintf("RankedPlayEnabled: %s", ($championDTO->isRankedPlayEnabled() ? 'true' : 'false')), 1);
    }
}