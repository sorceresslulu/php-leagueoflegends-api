<?php
namespace LolAPIExamples\Champion;

use LolAPI\Service\Champion\Ver1_2\ChampionList\DTO\ChampionListDTO;
use LolAPI\Service\Champion\Ver1_2\ChampionList\DTOBuilder;
use LolAPI\Service\Champion\Ver1_2\ChampionList\Request;
use LolAPI\Service\Champion\Ver1_2\ChampionList\Service;
use LolAPIExamples\ExampleTest;

class ChampionListTest extends ExampleTest
{
    public function testExample()
    {
        $service = new Service($this->getLolAPIHandler());
        $request = new Request($this->getApiKey(), $this->getRegionalEndpoint(), true);

        $query = $service->createQuery($request);
        $response = $query->execute();

        $dtoBuilder = new DTOBuilder();
        $dto = $dtoBuilder->buildDTO($response);

        if($this->isOutputEnabled()) {
            $this->processResult($dto);
        }
    }

    private function processResult(ChampionListDTO $championDTOs) {
        foreach($championDTOs->getChampionDTOs() as $championDTO) {
            println(sprintf("Champion #%d", $championDTO->getId()));
            println(sprintf("Active: %s", ($championDTO->isActive() ? 'true' : 'false')), 1);
            println(sprintf("BotEnabled: %s", ($championDTO->isBotEnabled() ? 'true' : 'false')), 1);
            println(sprintf("BotMmEnabled: %s", ($championDTO->isBotMmEnabled() ? 'true' : 'false')), 1);
            println(sprintf("FreeToPlay: %s", ($championDTO->isFreeToPlay() ? 'true' : 'false')), 1);
            println(sprintf("RankedPlayEnabled: %s", ($championDTO->isRankedPlayEnabled() ? 'true' : 'false')), 1);
        }
    }
}