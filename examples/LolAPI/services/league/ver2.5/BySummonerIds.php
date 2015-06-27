<?php
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

$config = getConfig();
$apiKey = new \LolAPI\APIKey($config['apiKey']);
$regionFactory = new \LolAPI\Region\RegionFactory(new \LolAPI\Region\UnknownRegionPolicy\ThrowUnknownRegionExceptionPolicy());
$region = $regionFactory->getRegionByStringCode($config['region']);

$leagueQueueTypeFactory = new \LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeFactory(
    new LolAPI\GameConstants\LeagueQueueType\UnknownLQTypePolicy\ThrowsOutOfBoundsExceptionPolicy()
);

$leagueTierFactory = new \LolAPI\GameConstants\LeagueTier\LeagueTierFactory(
    new LolAPI\GameConstants\LeagueTier\UnknownTierPolicy\ThrowsOutOfBoundsExceptionPolicy()
);

$apiHandler = new LolAPI\Handler\CURL\Handler();
$service = new LolAPI\Service\League\Ver2_5\BySummonerIds\Service(
    $apiHandler,
    $leagueQueueTypeFactory,
    $leagueTierFactory
);

$request = new LolAPI\Service\League\Ver2_5\BySummonerIds\Request($apiKey, $region, array($config['summonerId'], $config['summonerIdWithTeam']));
$query = $service->createQuery($request);
$queryResult = $query->execute();

function processQueryResult(LolAPI\Service\League\Ver2_5\BySummonerIds\QueryResult $queryResult) {
    foreach($queryResult->getSummonerDTOs() as $summonerDTO) {
        println(sprintf("Summoner DTO (%d)", $summonerDTO->getSummonerId()));

        foreach($summonerDTO->getLeaguePlayerDTOs() as $leagueDTO) {
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

        foreach($summonerDTO->getLeagueTeamDTOs() as $leagueDTO) {
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
    }
}

processQueryResult($queryResult);