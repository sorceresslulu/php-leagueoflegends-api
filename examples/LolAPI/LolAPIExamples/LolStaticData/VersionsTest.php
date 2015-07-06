<?php
namespace LolAPIExamples\LolStaticData;

use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\LolStaticData\Ver1_2\Versions\DTO\VersionsDTO;
use LolAPI\Service\LolStaticData\Ver1_2\Versions\DTOBuilder;
use LolAPI\Service\LolStaticData\Ver1_2\Versions\Request;
use LolAPI\Service\LolStaticData\Ver1_2\Versions\Service;
use LolAPIExamples\ExampleTest;

class VersionsTest extends ExampleTest
{
    public function testExample()
    {
        $service = new Service($this->getLolAPIHandler());

        $request = new Request($this->getApiKey(), $this->getRegionalEndpoint());
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

    private function processResult(VersionsDTO $versionsDTO)
    {
        println(sprintf("Last version: %s", $versionsDTO->getLastVersion()));
        println(sprintf("All versions"), 0);
        println(implode("\n  ", $versionsDTO->getVersions()), 1);
    }
}