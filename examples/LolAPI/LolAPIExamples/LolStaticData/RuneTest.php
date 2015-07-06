<?php
namespace LolAPIExamples\LolStaticData;

use LolAPI\Service\LolStaticData\Ver1_2\Rune\Request;
use LolAPI\Service\LolStaticData\Ver1_2\Rune\Service;
use LolAPIExamples\ExampleTest;

class RuneTest extends ExampleTest
{
    public function testExample()
    {
        $config = $this->getConfig();
        $service = new Service($this->getLolAPIHandler());

        $request = new Request($this->getApiKey(), $this->getRegionalEndpoint(), $config['runeId']);
        $query = $service->createQuery($request);

        $query->execute();
    }
}