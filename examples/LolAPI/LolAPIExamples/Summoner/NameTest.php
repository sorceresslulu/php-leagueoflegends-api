<?php
namespace LolAPIExamples\Summoner;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Summoner\Ver1_4\Name\DTO\NameDTO;
use LolAPI\Service\Summoner\Ver1_4\Name\DTOBuilder;
use LolAPI\Service\Summoner\Ver1_4\Name\Request;
use LolAPI\Service\Summoner\Ver1_4\Name\Service;
use LolAPIExamples\ExampleTest;

class NameTest extends ExampleTest
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

    private function buildDTO(ResponseInterface $response)
    {
        $dtoBuilder = new DTOBuilder();

        return $dtoBuilder->buildDTO($response);
    }

    private function processResult(NameDTO $dto)
    {
        foreach ($dto->getSummonerDTOs() as $summonerDTO) {
            println("Summoner DTO:");
            println("ID: " . $summonerDTO->getSummonerId(), 1);
            println("Name: " . $summonerDTO->getSummonerName(), 1);
        }
    }
}