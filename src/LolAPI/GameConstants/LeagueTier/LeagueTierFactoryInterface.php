<?php
namespace LolAPI\GameConstants\LeagueTier;

interface LeagueTierFactoryInterface
{
    /**
     * Create ad returns LeagueTier by string code
     * @param string $leagueTierCode
     * @return LeagueTierInterface
     */
    public function createLeagueTierByStringCode($leagueTierCode);
}