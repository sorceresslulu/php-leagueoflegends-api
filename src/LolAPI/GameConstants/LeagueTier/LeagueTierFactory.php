<?php
namespace LolAPI\GameConstants\LeagueTier;

use LolAPI\GameConstants\LeagueTier\Tiers\BronzeTier;
use LolAPI\GameConstants\LeagueTier\Tiers\ChallengerTier;
use LolAPI\GameConstants\LeagueTier\Tiers\DiamondTier;
use LolAPI\GameConstants\LeagueTier\Tiers\GoldTier;
use LolAPI\GameConstants\LeagueTier\Tiers\MasterTier;
use LolAPI\GameConstants\LeagueTier\Tiers\PlatinumTier;
use LolAPI\GameConstants\LeagueTier\Tiers\SilverTier;

class LeagueTierFactory implements LeagueTierFactoryInterface
{
    /**
     * Policy for unknown tiers
     * @var UnknownTierPolicyInterface
     */
    private $unknownTierPolicy;

    /**
     * LeagueTier factory
     * @param UnknownTierPolicyInterface $unknownTierPolicy
     */
    public function __construct(UnknownTierPolicyInterface $unknownTierPolicy)
    {
        $this->unknownTierPolicy = $unknownTierPolicy;
    }

    /**
     * Returns policy for unknown tiers
     * @return UnknownTierPolicyInterface
     */
    protected function getUnknownTierPolicy()
    {
        return $this->unknownTierPolicy;
    }

    /**
     * Create ad returns LeagueTier by string code
     * @param string $leagueTierCode
     * @return LeagueTierInterface
     */
    public function createLeagueTierByStringCode($leagueTierCode)
    {
        switch($leagueTierCode) {
            default:
                return $this->getUnknownTierPolicy()->getUnknownTier($leagueTierCode);

            case LeagueTierInterface::TIER_BRONZE:
                return new BronzeTier();

            case LeagueTierInterface::TIER_SILVER:
                return new SilverTier();

            case LeagueTierInterface::TIER_GOLD:
                return new GoldTier();

            case LeagueTierInterface::TIER_PLATINUM:
                return new PlatinumTier();

            case LeagueTierInterface::TIER_DIAMOND:
                return new DiamondTier();

            case LeagueTierInterface::TIER_MASTER:
                return new MasterTier();

            case LeagueTierInterface::TIER_CHALLENGER:
                return new ChallengerTier();
        }
    }
}