<?php
/**
 * I have some reasons to not use PHPUnit
 */
require_once (__DIR__).'/bootstrap/bootstrap.php';

class TestRunner
{
    /**
     * Tests
     * @var array
     */
    private $testClassNames;

    public function __construct($testClassNames)
    {
        $this->testClassNames = $testClassNames;
    }

    public function runTests()
    {
        foreach($this->testClassNames as $testIndex => $testClassName) {
            println(sprintf("[%d/%d] Test `%s`", $testIndex + 1, count($this->testClassNames), $testClassName));

            /** @var \LolAPIExamples\ExampleTest $test */
            $test = new $testClassName();
            $test->disableOutput();

            $this->runTest($test);
        }
    }

    public function runSpecifiedTest($testClassName, $enableOutput = true)
    {
        /** @var \LolAPIExamples\ExampleTest $test */
        $test = new $testClassName();

        if($enableOutput) {
            $test->enableOutput();
        }else{
            $test->disableOutput();
        }

        $test->testExample();
    }

    private function runTest(\LolAPIExamples\TestInterface $test)
    {
        $done = false;

        while($done === false) {
            try {
                $test->testExample();

                $done = true;

                println("Success", 1);
            }catch(\LolAPI\Exceptions\RateLimitExceedException $e) {
                println("Rate limit exceed, waiting for 10 seconds", 1);
                sleep(10);
            }catch(\LolAPI\Exceptions\LolAPIException $e)  {
                println(sprintf("Error, HTTP code: %d, message: %s", $e->getCode(), $e->getMessage()), 1);
                println("Failed", 1);
                die();
            }
        }
    }
}

function testMain() {
    $testRunnerInstance = new TestRunner(array(
        '\LolAPIExamples\Champion\ChampionTest',
        '\LolAPIExamples\Champion\ChampionListTest',
        '\LolAPIExamples\CurrentGame\SpectatorGameInfoTest',
        '\LolAPIExamples\FeaturedGames\FeaturedGamesTest',
        '\LolAPIExamples\Game\RecentTest',
        '\LolAPIExamples\League\BySummonerIdsTest',
        '\LolAPIExamples\League\BySummonerIdsEntryTest',
        '\LolAPIExamples\League\ByTeamIdsTest',
        '\LolAPIExamples\League\ByTeamIdsEntryTest',
        '\LolAPIExamples\League\ChallengerTest',
        '\LolAPIExamples\League\MasterTest',
        '\LolAPIExamples\LolStaticData\RuneTest',
        '\LolAPIExamples\LolStaticData\VersionsTest',
        '\LolAPIExamples\LolStatus\ShardsTest',
        '\LolAPIExamples\LolStatus\ShardStatusTest',
        '\LolAPIExamples\Match\ByMatchIdTest',
        '\LolAPIExamples\MatchHistory\BySummonerIdTest',
        '\LolAPIExamples\Stats\SummaryTest',
        '\LolAPIExamples\Summoner\ByIdsTest',
        '\LolAPIExamples\Summoner\ByNamesTest',
        '\LolAPIExamples\Summoner\MasteriesTest',
        '\LolAPIExamples\Summoner\NameTest',
        '\LolAPIExamples\Summoner\RunesTest',
        '\LolAPIExamples\Team\BySummonerIdsTest',
        '\LolAPIExamples\Team\ByTeamIdsTest',
    ));

    global $argv;

    if(isset($argv[1])) {
        $testRunnerInstance->runSpecifiedTest(str_replace('/', '\\', '/LolAPIExamples/'.$argv[1]), true);
    }else{
        $testRunnerInstance->runTests();
    }
}

testMain();
