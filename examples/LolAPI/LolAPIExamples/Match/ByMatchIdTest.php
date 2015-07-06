<?php
namespace LolAPIExamples\Match;

use LolAPI\Service\Match\Ver2_2\ByMatchId\Request;
use LolAPI\Service\Match\Ver2_2\ByMatchId\Service;
use LolAPIExamples\ExampleTest;

class ByMatchIdTest extends ExampleTest
{
    public function testExample()
    {
        $config = $this->getConfig();
        $service = new Service($this->getLolAPIHandler());

        $request = new Request($this->getApiKey(), $this->getRegionalEndpoint(), $config['matchId']);
        $query = $service->createQuery($request);
        $query->execute();
    }
}