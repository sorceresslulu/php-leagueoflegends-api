<?php
namespace LolAPI\Service\League\Ver2_5\Component;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeFactoryInterface;
use LolAPI\GameConstants\LeagueTier\LeagueTierFactoryInterface;
use LolAPI\Service\League\Ver2_5\Component\DTO\League\MiniSeriesDTO;
use LolAPI\Service\League\Ver2_5\Component\DTO\League\Player\LeaguePlayerEntryDTO;
use LolAPI\Service\League\Ver2_5\Component\DTO\League\Player\LeaguePlayersDTO;
use LolAPI\Service\League\Ver2_5\Component\DTO\League\Team\LeagueTeamEntryDTO;
use LolAPI\Service\League\Ver2_5\Component\DTO\League\Team\LeagueTeamsDTO;

class LeagueDTOBuilder
{
    /**
     * LeagueQueueType Factory
     * @var LeagueQueueTypeFactoryInterface
     */
    private $leagueQueueTypeFactory;

    /**
     * LeagueTier Factory
     * @var LeagueTierFactoryInterface
     */
    private $leagueTierFactory;

    /**
     * LeagueDTO builder
     * @param LeagueQueueTypeFactoryInterface $leagueQueueTypeFactory
     * @param LeagueTierFactoryInterface $leagueTierFactory
     */
    public function __construct(LeagueQueueTypeFactoryInterface $leagueQueueTypeFactory, LeagueTierFactoryInterface $leagueTierFactory)
    {
        $this->leagueQueueTypeFactory = $leagueQueueTypeFactory;
        $this->leagueTierFactory = $leagueTierFactory;
    }


    /**
     * Returns LeagueQueueType Factory
     * @return LeagueQueueTypeFactoryInterface
     */
    public function getLeagueQueueTypeFactory()
    {
        return $this->leagueQueueTypeFactory;
    }

    /**
     * Returs LeagueTier Factory
     * @return LeagueTierFactoryInterface
     */
    protected function getLeagueTierFactory()
    {
        return $this->leagueTierFactory;
    }

    /**
     * Builds and returns LeagueDTO
     * @param array $jsonLeagueDTO
     * @return LeaguePlayersDTO|LeagueTeamsDTO
     * @throws \Exception
     */
    public function buildLeagueDTO(array $jsonLeagueDTO)
    {
        $leagueQueueType = $this->getLeagueQueueTypeFactory()->createLQTypeByStringCode($jsonLeagueDTO['queue']);

        if($leagueQueueType->forSolo()) {
            return $this->buildLeaguePlayerDTO($jsonLeagueDTO);
        }else if($leagueQueueType->forTeam()) {
            return $this->buildLeagueTeamDTO($jsonLeagueDTO);
        }else{
            throw new \Exception(sprintf("No idea how to build DTO for league queue type `%s`", $leagueQueueType->getCode()));
        }
    }

    /**
     * Builds and returns LeagueDTO (Team requests)
     * @param array $jsonLeagueDTO
     * @return LeagueTeamsDTO
     */
    private function buildLeagueTeamDTO(array $jsonLeagueDTO)
    {
        return new LeagueTeamsDTO(
            $jsonLeagueDTO['name'],
            isset($jsonLeagueDTO['participantId']) ? $jsonLeagueDTO['participantId'] : null,
            $this->getLeagueQueueTypeFactory()->createLQTypeByStringCode($jsonLeagueDTO['queue']),
            $this->getLeagueTierFactory()->createLeagueTierByStringCode($jsonLeagueDTO['tier']),
            $this->buildTeamEntries(isset($jsonLeagueDTO['entries']) ? $jsonLeagueDTO['entries'] : array())
        );
    }

    /**
     * Builds and returns LeagueDTO (player requests)
     * @param array $jsonLeagueDTO
     * @return LeaguePlayersDTO
     */
    private function buildLeaguePlayerDTO(array $jsonLeagueDTO)
    {
        return new LeaguePlayersDTO(
            $jsonLeagueDTO['name'],
            isset($jsonLeagueDTO['participantId']) ? $jsonLeagueDTO['participantId'] : null,
            $this->getLeagueQueueTypeFactory()->createLQTypeByStringCode($jsonLeagueDTO['queue']),
            $this->getLeagueTierFactory()->createLeagueTierByStringCode($jsonLeagueDTO['tier']),
            $this->buildPlayerEntries(isset($jsonLeagueDTO['entries']) ? $jsonLeagueDTO['entries'] : array())
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
            $entries[] = new LeagueTeamEntryDTO(
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
            $entries[] = new LeaguePlayerEntryDTO(
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