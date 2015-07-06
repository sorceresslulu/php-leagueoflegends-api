<?php
namespace LolAPIExamples\LolStaticData;

use LolAPI\Service\LolStaticData\Ver1_2\Items\Request;
use LolAPI\Service\LolStaticData\Ver1_2\Items\Service;
use LolAPIExamples\ExampleTest;

class ItemsTest extends ExampleTest
{
    public function testExample()
    {
        $service = new Service($this->getLolAPIHandler());
        $request = new Request(
            $this->getApiKey(),
            $this->getRegionalEndpoint()
        );

        $query = $service->createQuery($request);
        $response = $query->execute();

        if($this->isOutputEnabled()) {
            var_dump($response->parse());
        }
    }
}