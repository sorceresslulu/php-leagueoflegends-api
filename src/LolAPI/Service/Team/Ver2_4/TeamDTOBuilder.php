<?php
namespace LolAPI\Service\Team\Ver2_4;

use LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\TeamDTO;
use LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\TeamMemberInfoDTO;
use LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\TeamStatDetailDTO;
use LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\MatchHistorySummaryDTO;
use LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\RosterDTO;
use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;


class TeamDTOBuilder
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
     * Builds and returns TeamDTO
     * @param array $arrTeam
     * @return TeamDTO
     */
    public function buildTeamDTO(array $arrTeam)
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
     * @return \LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\MatchHistorySummaryDTO
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
     * @return \LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\TeamStatDetailDTO
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
     * @return \LolAPI\Service\Team\Ver2_4\Component\TeamDTOBuilder\RosterDTO
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