<?php
namespace LolAPIExamples\LolStaticData;

use LolAPI\Service\LolStaticData\Ver1_2\SummonerSpellById\Request;
use LolAPI\Service\LolStaticData\Ver1_2\SummonerSpellById\Service;
use LolAPIExamples\ExampleTest;

class SummonerSpellByIdTest extends ExampleTest
{
    public function testExample()
    {
        $config = $this->getConfig();
        $service = new Service($this->getLolAPIHandler());
        $request = new Request(
            $this->getApiKey(),
            $this->getRegionalEndpoint(),
            $config['summonerSpellId']
        );

        $query = $service->createQuery($request);
        $response = $query->execute();

        if($this->isOutputEnabled()) {
            var_dump($response->parse());
        }
    }
}