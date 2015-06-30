<?php
/**
 * I have some reasons to not use PHPUnit
 */
require_once (__DIR__).'/bootstrap/bootstrap.php';

$tests = array(
    (__DIR__).'/services/champion/ver1.2/Champion.php',
    (__DIR__).'/services/champion/ver1.2/ChampionList.php',
    (__DIR__).'/services/current-game/ver1.0/SpectatorGameInfo.php',
    (__DIR__).'/services/featured-games/ver1.0/FeaturedGames.php',
    (__DIR__).'/services/game/ver1.3/Recent.php',
    (__DIR__).'/services/league/ver2.5/BySummonerIds.php',
    (__DIR__).'/services/league/ver2.5/BySummonerIdsEntry.php',
    (__DIR__).'/services/league/ver2.5/ByTeamIds.php',
    (__DIR__).'/services/league/ver2.5/ByTeamIdsEntry.php',
    (__DIR__).'/services/league/ver2.5/Challenger.php',
    (__DIR__).'/services/league/ver2.5/Master.php',
    (__DIR__).'/services/lol-status/ver1.0/ShardsStatus.php',
    (__DIR__).'/services/lol-status/ver1.0/ShardStatus.php',
    (__DIR__).'/services/stats/ver1.3/BySummoner.php',
    (__DIR__).'/services/stats/ver1.3/Summary.php',
    (__DIR__).'/services/summoner/ver1.4/ByIds.php',
    (__DIR__).'/services/summoner/ver1.4/ByName.php',
    (__DIR__).'/services/summoner/ver1.4/Masteries.php',
    (__DIR__).'/services/summoner/ver1.4/Name.php',
    (__DIR__).'/services/summoner/ver1.4/Runes.php',
    (__DIR__).'/services/team/ver2.4/TBySummonerIds.php',
    (__DIR__).'/services/team/ver2.4/TByTeamIds.php',
);

$done = false;

foreach($tests as $index => $script) {
    $done = false;
    $testFunc = include $script;

    if(is_callable($testFunc)) {
        while(!$done) {
            try {
                echo sprintf("Run script [%d/%d] %s", $index, count($tests), $script), " ...";

                ob_start(); $testFunc(); ob_end_clean();
                $done = true;
                echo " done\n";
            }catch(\LolAPI\Exceptions\RateLimitExceedException $e) {
                ob_end_clean();
                echo "rate limit exceed, waiting for 10 seconds\n";
                sleep(10);
            }
        }
    }else{
        throw new \Exception("Test not found");
    }
}