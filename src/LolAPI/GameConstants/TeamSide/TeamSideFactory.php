<?php
namespace LolAPI\GameConstants\TeamSide;

use LolAPI\GameConstants\TeamSide\Sides\Blue;
use LolAPI\GameConstants\TeamSide\Sides\Purple;

class TeamSideFactory implements TeamSideFactoryInterface
{
    /**
     * Policy for unknown side
     * @var UnknownSidePolicyInterface
     */
    private $unknownSidePolicy;

    /**
     * Returns policy for unknown side
     * @param UnknownSidePolicyInterface $unknownSidePolicy
     */
    public function __construct(UnknownSidePolicyInterface $unknownSidePolicy)
    {
        $this->unknownSidePolicy = $unknownSidePolicy;
    }

    /**
     * Returns policy for unknown side
     * @return UnknownSidePolicyInterface
     */
    protected function getUnknownSidePolicy()
    {
        return $this->unknownSidePolicy;
    }

    /**
     * Create and returns team side from teamId
     * @param int $teamId
     * @return TeamSideInterface
     */
    public function createFromTeamId($teamId)
    {
        switch($teamId) {
            default:
                return $this->getUnknownSidePolicy()->getUnknownSide($teamId);

            case TeamSideInterface::TEAM_SIDE_BLUE_ID:
                return new Blue();

            case TeamSideInterface::TEAM_SIDE_PURPLE_ID:
                return new Purple();
        }
    }
}