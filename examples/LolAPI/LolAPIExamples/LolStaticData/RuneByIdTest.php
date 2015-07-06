<?php
namespace LolAPIExamples\LolStaticData;

use LolAPI\Service\LolStaticData\Ver1_2\RuneById\Request;
use LolAPI\Service\LolStaticData\Ver1_2\RuneById\Service;
use LolAPIExamples\ExampleTest;

class RuneByIdTest extends ExampleTest
{
    public function testExample()
    {
        $config = $this->getConfig();
        $service = new Service($this->getLolAPIHandler());

        $request = new Request($this->getApiKey(), $this->getRegionalEndpoint(), $config['runeId']);
        $query = $service->createQuery($request);
        $response = $query->execute();

        if($this->isOutputEnabled()) {
            var_dump($response->parse());
        }
    }
}