<?php
namespace LolAPI\Service\Team\Ver2_4\BySummonerIds;

use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Team\Ver2_4\BySummonerIds\QueryResult\MatchHistorySummaryDTO;
use LolAPI\Service\Team\Ver2_4\BySummonerIds\QueryResult\RosterDTO;
use LolAPI\Service\Team\Ver2_4\BySummonerIds\QueryResult\SummonerDTO;
use LolAPI\Service\Team\Ver2_4\BySummonerIds\QueryResult\TeamDTO;
use LolAPI\Service\Team\Ver2_4\BySummonerIds\QueryResult\TeamMemberInfoDTO;
use LolAPI\Service\Team\Ver2_4\BySummonerIds\QueryResult\TeamStatDetailDTO;

class QueryResultBuilder
{
    /**
     * GameMode Factory
     * @var GameModeFactory
     */
    private $gameModeFactory;

    /**
     * MapId Factory
     * @var MapIdFactory
     */
    private $mapIdFactory;

    /**
     * QueryResultBuilder
     * @param GameModeFactory $gameModeFactory
     * @param $mapIdFactory
     */
    public function __construct(GameModeFactory $gameModeFactory, MapIdFactory $mapIdFactory)
    {
        $this->gameModeFactory = $gameModeFactory;
        $this->mapIdFactory = $mapIdFactory;
    }

    /**
     * Builds QueryResult object
     * @param ResponseInterface $response
     * @return QueryResult
     */
    public function build(ResponseInterface $response)
    {
        $jsonResponse = $response->parseJSON();
        $summonerDTOs = array();

        foreach($jsonResponse as $summonerId => $arrTeams) {
            $teams = array();

            foreach($arrTeams as $arrTeam) {
                $teams[] = $this->buildTeamDTO($arrTeam);
            }

            $summonerDTOs[] = new SummonerDTO((int) $summonerId, $teams);
        }

        return new QueryResult($response, $summonerDTOs);
    }

    /**
     * Builds TeamDTO
     * @param array $arrTeam
     * @return TeamDTO
     */
    private function buildTeamDTO(array $arrTeam)
    {
        $matchHistory = array();
        $teamStatDetails = array();

        if(isset($arrTeam['matchHistory'])) {
            foreach($arrTeam['matchHistory'] as $arrMatchHistory) {
                $matchHistory[] = $this->buildMatchHistory($arrMatchHistory);
            }
        }

        if(isset($arrTeam['teamStatDetails'])) {
            foreach($arrTeam['teamStatDetails'] as $arrTeamStatDetails) {
                $teamStatDetails[] = $this->buildTeamStatDetails($arrTeamStatDetails);
            }
        }

        return new TeamDTO(
            $arrTeam['fullId'],
            $arrTeam['name'],
            $arrTeam['status'],
            $arrTeam['tag'],
            (int) $arrTeam['createDate'],
            (int) $arrTeam['modifyDate'],
            (int) $arrTeam['lastGameDate'],
            (int) $arrTeam['lastJoinDate'],
            (int) $arrTeam['secondLastJoinDate'],
            (int) $arrTeam['thirdLastJoinDate'],
            (int) $arrTeam['lastJoinedRankedTeamQueueDate'],
            $matchHistory,
            $this->buildRoster($arrTeam['roster']),
            $teamStatDetails
        );
    }

    /**
     * Builds Match History
     * @param array $arrMatchHistory
     * @return MatchHistorySummaryDTO
     */
    private function buildMatchHistory(array $arrMatchHistory)
    {
        return new MatchHistorySummaryDTO(
            (int) $arrMatchHistory['gameId'],
            (int) $arrMatchHistory['date'],
            $this->getGameModeFactory()->createFromStringCode($arrMatchHistory['gameMode']),
            $this->getMapIdFactory()->createFromIntCode((int) $arrMatchHistory['mapId']),
            (int) $arrMatchHistory['assists'],
            (int) $arrMatchHistory['deaths'],
            (int) $arrMatchHistory['opposingTeamKills'],
            $arrMatchHistory['opposingTeamName'],
            (bool) $arrMatchHistory['win'],
            (bool) $arrMatchHistory['invalid']
        );
    }

    /**
     * Builds teams stats
     * @param array $arrTeamStatDetails
     * @return TeamStatDetailDTO
     */
    private function buildTeamStatDetails(array $arrTeamStatDetails)
    {
        return new TeamStatDetailDTO(
            $arrTeamStatDetails['teamStatType'],
            (int) $arrTeamStatDetails['averageGamesPlayed'],
            (int) $arrTeamStatDetails['wins'],
            (int) $arrTeamStatDetails['losses']
        );
    }

    /**
     * Builds roster
     * @param array $arrRoster
     * @return RosterDTO
     */
    private function buildRoster(array $arrRoster)
    {
        $members = array();

        if(isset($arrRoster['memberList'])) {
            foreach($arrRoster['memberList'] as $arrMember) {
                $members[] = new TeamMemberInfoDTO(
                    (int) $arrMember['inviteDate'],
                    (int) $arrMember['joinDate'],
                    (int) $arrMember['playerId'],
                    $arrMember['status']
                );
            }
        }

        return new RosterDTO((int) $arrRoster['ownerId'], $members);
    }

    /**
     * Returns GameMode factory
     * @return GameModeFactory
     */
    protected function getGameModeFactory()
    {
        return $this->gameModeFactory;
    }

    /**
     * Returns MapId Factory
     * @return MapIdFactory
     */
    protected function getMapIdFactory()
    {
        return $this->mapIdFactory;
    }
}