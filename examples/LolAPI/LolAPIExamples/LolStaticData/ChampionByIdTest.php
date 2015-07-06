<?php
namespace LolAPIExamples\LolStaticData;

use LolAPI\Service\LolStaticData\Ver1_2\ChampionById\Request;
use LolAPI\Service\LolStaticData\Ver1_2\ChampionById\Service;
use LolAPIExamples\ExampleTest;

class ChampionByIdTest extends ExampleTest
{
    public function testExample()
    {
        $config = $this->getConfig();
        $service = new Service($this->getLolAPIHandler());
        $request = new Request(
            $this->getApiKey(),
            $this->getRegionalEndpoint(),
            $config['championId']
        );

        $query = $service->createQuery($request);
        $response = $query->execute();

        if($this->isOutputEnabled()) {
            var_dump($response->parse());
        }
    }
}