<?php
namespace LolAPI\Service\League\Ver2_5\Component;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeFactory;
use LolAPI\GameConstants\LeagueTier\LeagueTierFactory;
use LolAPI\Service\League\Ver2_5\Component\DTO\League\MiniSeriesDTO;
use LolAPI\Service\League\Ver2_5\Component\DTO\League\Player\LeaguePlayerEntryDTO;
use LolAPI\Service\League\Ver2_5\Component\DTO\League\Player\LeaguePlayersDTO;
use LolAPI\Service\League\Ver2_5\Component\DTO\League\Team\LeagueTeamEntryDTO;
use LolAPI\Service\League\Ver2_5\Component\DTO\League\Team\LeagueTeamsDTO;

class DTOBuilder
{
    /**
     * LeagueQueueType Factory
     * @var LeagueQueueTypeFactory
     */
    private $leagueQueueTypeFactory;

    /**
     * LeagueTier Factory
     * @var LeagueTierFactory
     */
    private $leagueTierFactory;

    /**
     * LeagueDTO builder
     * @param LeagueQueueTypeFactory $leagueQueueTypeFactory
     * @param LeagueTierFactory $leagueTierFactory
     */
    public function __construct(LeagueQueueTypeFactory $leagueQueueTypeFactory, LeagueTierFactory $leagueTierFactory)
    {
        $this->leagueQueueTypeFactory = $leagueQueueTypeFactory;
        $this->leagueTierFactory = $leagueTierFactory;
    }


    /**
     * Returns LeagueQueueType Factory
     * @return LeagueQueueTypeFactory
     */
    public function getLeagueQueueTypeFactory()
    {
        return $this->leagueQueueTypeFactory;
    }

    /**
     * Returs LeagueTier Factory
     * @return LeagueTierFactory
     */
    protected function getLeagueTierFactory()
    {
        return $this->leagueTierFactory;
    }

    /**
     * Builds and returns LeagueDTO (Team requests)
     * @param array $jsonResponse
     * @return LeagueTeamsDTO
     */
    public function buildLeagueTeamDTO(array $jsonResponse)
    {
        return new LeagueTeamsDTO(
            $jsonResponse['name'],
            isset($jsonResponse['participantId']) ? $jsonResponse['participantId'] : null,
            $this->getLeagueQueueTypeFactory()->createLQTypeByStringCode($jsonResponse['queue']),
            $this->getLeagueTierFactory()->createLeagueTierByStringCode($jsonResponse['tier']),
            $this->buildTeamEntries(isset($jsonResponse['entries']) ? $jsonResponse['entries'] : array())
        );
    }

    /**
     * Builds and returns LeagueDTO (player requests)
     * @param array $jsonResponse
     * @return LeaguePlayersDTO
     */
    public function buildLeaguePlayerDTO(array $jsonResponse)
    {
        return new LeaguePlayersDTO(
            $jsonResponse['name'],
            isset($jsonResponse['participantId']) ? $jsonResponse['participantId'] : null,
            $this->getLeagueQueueTypeFactory()->createLQTypeByStringCode($jsonResponse['queue']),
            $this->getLeagueTierFactory()->createLeagueTierByStringCode($jsonResponse['tier']),
            $this->buildPlayerEntries(isset($jsonResponse['entries']) ? $jsonResponse['entries'] : array())
        );
    }

    /**
     * Builds and returns LeagueEntryDTOs (team requests)
     * @param array $jsonEntries
     * @return array
     */
    private function buildTeamEntries(array $jsonEntries)
    {
        $entries = array();

        foreach($jsonEntries as $jsonEntry) {
            $jsonEntry[] = new LeagueTeamEntryDTO(
                $jsonEntry['division'],
                (bool) $jsonEntry['isFreshBlood'],
                (bool) $jsonEntry['isHotStreak'],
                (bool) $jsonEntry['isInactive'],
                (bool) $jsonEntry['isVeteran'],
                (int) $jsonEntry['leaguePoints'],
                (int) $jsonEntry['wins'],
                (int) $jsonEntry['losses'],
                (isset($jsonEntry['miniSeries'])
                    ? new MiniSeriesDTO(
                        (int) $jsonEntry['miniSeries']['target'],
                        $jsonEntry['miniSeries']['progress'],
                        (int) $jsonEntry['miniSeries']['wins'],
                        (int) $jsonEntry['miniSeries']['losses']
                    )
                    : null
                ),
                (string) $jsonEntry['playerOrTeamId'],
                (string) $jsonEntry['playerOrTeamName']
            );
        }

        return $entries;
    }

    /**
     * Builds and returns LeagueEntryDTOs (player requests)
     * @param array $jsonEntries
     * @return array
     */
    private function buildPlayerEntries(array $jsonEntries)
    {
        $entries = array();

        foreach($jsonEntries as $jsonEntry) {
            $jsonEntry[] = new LeaguePlayerEntryDTO(
                $jsonEntry['division'],
                (bool) $jsonEntry['isFreshBlood'],
                (bool) $jsonEntry['isHotStreak'],
                (bool) $jsonEntry['isInactive'],
                (bool) $jsonEntry['isVeteran'],
                (int) $jsonEntry['leaguePoints'],
                (int) $jsonEntry['wins'],
                (int) $jsonEntry['losses'],
                (isset($jsonEntry['miniSeries'])
                    ? new MiniSeriesDTO(
                        (int) $jsonEntry['miniSeries']['target'],
                        $jsonEntry['miniSeries']['progress'],
                        (int) $jsonEntry['miniSeries']['wins'],
                        (int) $jsonEntry['miniSeries']['losses']
                    )
                    : null
                ),
                (int) $jsonEntry['playerOrTeamId'],
                (string) $jsonEntry['playerOrTeamName']
            );
        }

        return $entries;
    }
}