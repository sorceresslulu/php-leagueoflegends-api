<?php
namespace LolAPI\GameConstants\PlayerStatSummaryType;

interface PSSTypeFactoryInterface
{
    /**
     * Create and returns PlayerStatSummaryType from string code
     * @param $stringCode
     * @return PlayerStatSummaryTypeInterface
     */
    public function createFromStringCode($stringCode);
}