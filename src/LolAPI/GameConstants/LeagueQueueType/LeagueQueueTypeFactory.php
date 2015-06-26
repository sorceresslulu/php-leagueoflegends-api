<?php
namespace LolAPI\GameConstants\LeagueQueueType;

use LolAPI\GameConstants\LeagueQueueType\Types\RankedSolo5x5LQType;
use LolAPI\GameConstants\LeagueQueueType\Types\RankedTeam3x3LQType;
use LolAPI\GameConstants\LeagueQueueType\Types\RankedTeam5x5LQType;

class LeagueQueueTypeFactory
{
    /**
     * Policy for unknown league queue type
     * @var UnknownLQTypePolicyInterface
     */
    private $unknownLQTypePolicy;

    /**
     * LeagueQueueType Factory
     * @param $unknownLQTypePolicy
     */
    public function __construct($unknownLQTypePolicy)
    {
        $this->unknownLQTypePolicy = $unknownLQTypePolicy;
    }

    /**
     * Returns policy for unknown league queue type
     * @return UnknownLQTypePolicyInterface
     */
    protected function getUnknownLQTypePolicy()
    {
        return $this->unknownLQTypePolicy;
    }

    /**
     * Create and returns LeagueQueueType by string code
     * @param string $leagueQueueTypeCode
     * @return LeagueQueueTypeInterface
     */
    public function createLQTypeByStringCode($leagueQueueTypeCode)
    {
        switch($leagueQueueTypeCode) {
            default:
                return $this->getUnknownLQTypePolicy()->getUnknownLQType($leagueQueueTypeCode);

            case LeagueQueueTypeInterface::LQT_RANKED_SOLO_5x5:
                return new RankedSolo5x5LQType();

            case LeagueQueueTypeInterface::LQT_RANKED_TEAM_5x5:
                return new RankedTeam5x5LQType();

            case LeagueQueueTypeInterface::LQT_RANKED_TEAM_3x3:
                return new RankedTeam3x3LQType();
        }
    }
}