<?php
namespace LolAPI\Service\League\Ver2_5\Component\DTO\League;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface;
use LolAPI\GameConstants\LeagueTier\LeagueTierInterface;
use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueInterface;

abstract class AbstractLeagueDTO
{
    /**
     * This name is an internal place-holder name only.
     * Display and localization of names in the game client are handled client-side.
     * @var string
     */
    private $name;

    /**
     * Specifies the relevant participant that is a member of this league (i.e., a requested summoner ID, a requested
     * team ID, or the ID of a team to which one of the requested summoners belongs).
     * Only present when full league is requested so that participant's entry can be identified.
     * Not present when individual entry is requested.
     * @var string|null
     */
    private $participantId;

    /**
     * The league's queue type
     * @var LeagueQueueTypeInterface
     */
    private $queue;

    /**
     * The league's tier
     * @var LeagueTierInterface
     */
    private $tier;

    /**
     * The requested league entries
     * @var \LolAPI\Service\League\Ver2_5\Component\DTO\League\Team\LeagueTeamEntryDTO[]
     */
    protected $entries = array();

    /**
     * League DTO
     * @param string $name
     * @param int $participantId
     * @param LeagueQueueTypeInterface $queue
     * @param LeagueTierInterface $tier
     * @param array $entries
     */
    public function __construct($name, $participantId, LeagueQueueTypeInterface $queue, LeagueTierInterface $tier, $entries)
    {
        $this->name = $name;
        $this->participantId = $participantId;
        $this->queue = $queue;
        $this->tier = $tier;
        $this->entries = $entries;
    }


    /**
     * Returns name
    league's tier
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns participantId
     * Specifies the relevant participant that is a member of this league (i.e., a requested summoner ID, a requested
     * team ID, or the ID of a team to which one of the requested summoners belongs).
     * Only present when full league is requested so that participant's entry can be identified.
     * Not present when individual entry is requested.
     * @return null|string
     */
    public function getParticipantId()
    {
        return $this->participantId;
    }

    /**
     * The league's queue type
     * @return LeagueQueueTypeInterface
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * Returns league's tier
     * @return LeagueTierInterface
     */
    public function getTier()
    {
        return $this->tier;
    }

    abstract public function getEntries();
}