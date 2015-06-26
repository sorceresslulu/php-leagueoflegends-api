<?php
namespace LolAPI\GameConstants\LeagueTier;

interface LeagueTierInterface
{
    const TIER_BRONZE = 'BRONZE';
    const TIER_SILVER = 'SILVER';
    const TIER_GOLD = 'GOLD';
    const TIER_PLATINUM = 'PLATINUM';
    const TIER_DIAMOND = 'DIAMOND';
    const TIER_MASTER = 'MASTER';
    const TIER_CHALLENGER = 'CHALLENGER';

    /**
     * Returns league tier code
     * @return string
     */
    public function getTierCode();
}