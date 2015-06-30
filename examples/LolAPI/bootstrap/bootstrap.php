<?php
require_once (__DIR__) . '/psr4.php';

$psr4AutoLoader = new Psr4AutoloaderClass();
$psr4AutoLoader->addNamespace('LolAPI', (__DIR__.'/../../../src/LolAPI'));
$psr4AutoLoader->register();

set_error_handler(function($errNo, $errStr, $errFile, $errLine) {
    throw new Exception(sprintf("[PHP ERROR] [%s:%d] %s", $errFile, $errLine, $errStr), $errNo);
});

function getConfig()
{
    return include __DIR__ . '/config.php';
}

function getApiKey()
{
    $config = include __DIR__ . '/config.php';

    return $config['apiKey'];
}

function println($message, $intend = 0) {
    while($intend > 0) {
        echo '  ';
        $intend--;
    }

    echo $message, "\n";
}

function printLeaguePlayerDTO(\LolAPI\Service\League\Ver2_5\Component\DTO\League\Player\LeaguePlayersDTO $leagueDTO) {
    println(sprintf("Name: %s", $leagueDTO->getName()), 1);
    println(sprintf("ParticipantId: %s", $leagueDTO->getParticipantId()), 1);
    println(sprintf("Queue/Code: %s", $leagueDTO->getQueue()->getCode()), 1);
    println(sprintf("Tier/Code: %s", $leagueDTO->getTier()->getTierCode()), 1);

    if($leagueDTO->hasEntries()) {
        println("Entries: ", 1);

        foreach($leagueDTO->getEntries() as $entry) {
            println(sprintf("PlayerId: %s", $entry->getPlayerId()), 2);
            println(sprintf("PlayerName: %s", $entry->getPlayerName()), 2);
            println(sprintf("Division: %s", $entry->getDivision()), 2);
            println(sprintf("IsFreshBlood: %s", ($entry->isFreshBlood() ? 'Y' : 'N')), 2);
            println(sprintf("IsHotStreak: %s", ($entry->isHotStreak() ? 'Y' : 'N')), 2);
            println(sprintf("IsInactive: %s", ($entry->isInactive() ? 'Y' : 'N')), 2);
            println(sprintf("IsVeteran: %s", ($entry->isVeteran() ? 'Y' : 'N')), 2);
            println(sprintf("LeaguePoints: %s", $entry->getLeaguePoints()), 2);
            println(sprintf("Wins: %s", $entry->getWins()), 2);
            println(sprintf("Lossess: %s", $entry->getLosses()), 2);

            if($entry->hasMiniSeries()) {
                println("Mini series: ", 2);

                println(sprintf("Progress: %s", $entry->getMiniSeries()->getProgress()), 3);
                println(sprintf("Target: %s", $entry->getMiniSeries()->getTarget()), 3);
                println(sprintf("Wins: %s", $entry->getMiniSeries()->getWins()), 3);
                println(sprintf("Losses: %s", $entry->getMiniSeries()->getLosses()), 3);
            }

            println("***", 2);
        }
    }
}

function printLeagueTeamDTO(\LolAPI\Service\League\Ver2_5\Component\DTO\League\Team\LeagueTeamsDTO $leagueDTO) {
    println(sprintf("Name: %s", $leagueDTO->getName()), 1);
    println(sprintf("ParticipantId: %s", $leagueDTO->getParticipantId()), 1);
    println(sprintf("Queue/Code: %s", $leagueDTO->getQueue()->getCode()), 1);
    println(sprintf("Tier/Code: %s", $leagueDTO->getTier()->getTierCode()), 1);

    if($leagueDTO->hasEntries()) {
        println("Entries: ", 1);

        foreach($leagueDTO->getEntries() as $entry) {
            println(sprintf("TeamId: %s", $entry->getTeamId()), 2);
            println(sprintf("TeamName: %s", $entry->getTeamName()), 2);
            println(sprintf("Division: %s", $entry->getDivision()), 2);
            println(sprintf("IsFreshBlood: %s", ($entry->isFreshBlood() ? 'Y' : 'N')), 2);
            println(sprintf("IsHotStreak: %s", ($entry->isHotStreak() ? 'Y' : 'N')), 2);
            println(sprintf("IsInactive: %s", ($entry->isInactive() ? 'Y' : 'N')), 2);
            println(sprintf("IsVeteran: %s", ($entry->isVeteran() ? 'Y' : 'N')), 2);
            println(sprintf("LeaguePoints: %s", $entry->getLeaguePoints()), 2);
            println(sprintf("Wins: %s", $entry->getWins()), 2);
            println(sprintf("Lossess: %s", $entry->getLosses()), 2);

            if($entry->hasMiniSeries()) {
                println("Mini series: ", 2);

                println(sprintf("Progress: %s", $entry->getMiniSeries()->getProgress()), 3);
                println(sprintf("Target: %s", $entry->getMiniSeries()->getTarget()), 3);
                println(sprintf("Wins: %s", $entry->getMiniSeries()->getWins()), 3);
                println(sprintf("Losses: %s", $entry->getMiniSeries()->getLosses()), 3);
            }

            println("***", 2);
        }
    }
}