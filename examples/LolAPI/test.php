<?php
/**
 * I have some reasons to not use PHPUnit
 */
require_once (__DIR__).'/bootstrap/bootstrap.php';

class TestRunner
{
    public function runTests(array $testClassNames)
    {
        foreach($testClassNames as $testIndex => $testClassName) {
            println(sprintf("[%d/%d] Test `%s`", $testIndex, count($testClassNames), $testClassName));

            /** @var \LolAPIExamples\ExampleTest $test */
            $test = new $testClassName();
            $done = false;

            while($done === false) {
                try {
                    $test->disableOutput();
                    $test->testExample();

                    $done = true;

                    println("Success", 1);
                }catch(\LolAPI\Exceptions\RateLimitExceedException $e) {
                    println("Rate limit exceed, waiting for 10 seconds", 1);
                    sleep(10);
                }catch(\LolAPI\Exceptions\LolAPIException $e)  {
                    println(sprintf("Error, HTTP code: %d", $e->getCode()), 1);
                    println("Failed", 1);
                }
            }
        }
    }
}

$testRunnerInstance = new TestRunner();
$testRunnerInstance->runTests(array(
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
    '\LolAPIExamples\LolStatus\ShardsTest',
    '\LolAPIExamples\LolStatus\ShardStatusTest',
));