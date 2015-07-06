<?php
namespace LolAPIExamples\MatchHistory;

use LolAPI\Service\MatchHistory\Ver2_2\BySummonerId\Request;
use LolAPI\Service\MatchHistory\Ver2_2\BySummonerId\Service;
use LolAPIExamples\ExampleTest;

class BySummonerIdTest extends ExampleTest
{
    public function testExample()
    {
        $config = $this->getConfig();
        $service = new Service($this->getLolAPIHandler());

        $request = new Request($this->getApiKey(), $this->getRegionalEndpoint(), $config['summonerId']);
        $query = $service->createQuery($request);
        $query->execute();
    }
}