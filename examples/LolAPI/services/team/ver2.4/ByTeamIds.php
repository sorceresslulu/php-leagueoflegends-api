<?php
require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

$config = getConfig();
$apiKey = new \LolAPI\APIKey($config['apiKey']);
$regionFactory = new \LolAPI\Region\RegionFactory(new \LolAPI\Region\UnknownRegionPolicy\ThrowUnknownRegionExceptionPolicy());
$region = $regionFactory->getRegionByStringCode($config['region']);

$mapIdFactory = new \LolAPI\GameConstants\MapId\MapIdFactory(
    new \LolAPI\GameConstants\MapId\UnknownMapIdPolicy\ThrowOutOfBoundsExceptionPolicy()
);

$gameModeFactory = new \LolAPI\GameConstants\GameMode\GameModeFactory(
    new \LolAPI\GameConstants\GameMode\UnknownGameModePolicy\ThrowOutOfBoundsExceptionPolicy()
);

$apiHandler = new LolAPI\Handler\CURL\Handler();

$service = new LolAPI\Service\Team\Ver2_4\ByTeamIds\Service(
    $apiHandler,
    $gameModeFactory,
    $mapIdFactory
);

function processQueryResult(LolAPI\Service\Team\Ver2_4\ByTeamIds\QueryResult $queryResult)
{
    foreach($queryResult->getTeamDTOs() as $teamDTO) {
        println(sprintf("FullId: %s", $teamDTO->getFullId()), 1);
        println(sprintf("Name: %s", $teamDTO->getName()), 1);
        println(sprintf("Status: %s", $teamDTO->getStatus()), 1);
        println(sprintf("Tag: %s", $teamDTO->getTag()), 1);
        println(sprintf("CreateDate: %s", $teamDTO->getCreateDate()), 1);
        println(sprintf("ModifyDate: %s", $teamDTO->getModifyDate()), 1);
        println(sprintf("LastGameDate: %s", $teamDTO->getLastGameDate()), 1);
        println(sprintf("LastJoinDate: %s", $teamDTO->getLastJoinDate()), 1);
        println(sprintf("SecondLastJoinDate: %s", $teamDTO->getSecondLastJoinDate()), 1);
        println(sprintf("ThirdLastJoinDate: %s", $teamDTO->getThirdLastJoinDate()), 1);
        println(sprintf("LastJoinedRankedTeamQueueDate: %s", $teamDTO->getLastJoinedRankedTeamQueueDate()), 1);

        if($teamDTO->hasMatchHistory()) {
            println("Match history", 1);

            foreach($teamDTO->getMatchHistory() as $match) {
                println(sprintf("GameId: %s", $match->getGameId()), 2);
                println(sprintf("Date: %s", $match->getDate()), 2);
                println(sprintf("GameMode/Code: %s", $match->getGameMode()->getCode()), 2);
                println(sprintf("MapId/Id: %s", $match->getMapId()->getId()), 2);
                println(sprintf("MapId/Name: %s", $match->getMapId()->getName()), 2);
                println(sprintf("MapId/Notes: %s", $match->getMapId()->getNotes()), 2);
                println(sprintf("Assists: %s", $match->getAssists()), 2);
                println(sprintf("Deaths: %s", $match->getDeaths()), 2);
                println(sprintf("OpposingTeamName: %s", $match->getOpposingTeamName()), 2);
                println(sprintf("OpposingTeamKills: %s", $match->getOpposingTeamKills()), 2);
                println(sprintf("IsInvalid: %s", ($match->isInvalid() ? 'true' : 'false')), 2);
                println(sprintf("IsWin: %s", ($match->isWin() ? 'true' : 'false')), 2);
                println("", 2);
            }
        }

        if($teamDTO->hasTeamStatsDetails()) {
            println("Stats", 1);

            foreach($teamDTO->getTeamStatDetails() as $statDetails) {
                println(sprintf("Type: %s", $statDetails->getTeamStatType()), 2);
                println(sprintf("AverageGamesPlayed: %s", $statDetails->getAverageGamesPlayed()), 2);
                println(sprintf("Wins: %s", $statDetails->getWins()), 2);
                println(sprintf("Losses: %s", $statDetails->getLosses()), 2);
                println(" ", 2);
            }
        }

        println("Roster", 1);
        println(sprintf("OwnerId: %s", $teamDTO->getRoster()->getOwnerId()), 2);

        if($teamDTO->getRoster()->hasMembers()) {
            println("Members", 1);

            foreach($teamDTO->getRoster()->getMemberList() as $member) {
                println(sprintf("PlayerId: %s", $member->getPlayerId()), 2);
                println(sprintf("Status: %s", $member->getStatus()), 2);
                println(sprintf("InviteDate: %s", $member->getInviteDate()), 2);
                println(sprintf("JoinDate: %s", $member->getJoinDate()), 2);
                println(" ", 2);
            }
        }

    }
}

$request = new LolAPI\Service\Team\Ver2_4\ByTeamIds\Request($apiKey, $region, array($config['teamId']));
$query = $service->createQuery($request);
$queryResult = $query->execute();

processQueryResult($queryResult);