<?php
namespace LolAPI\GameConstants\PlayerStatSummaryType\UnknownPSSPolicyInterface;

use LolAPI\GameConstants\PlayerStatSummaryType\PlayerStatSummaryTypeInterface;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\Unknown;
use LolAPI\GameConstants\PlayerStatSummaryType\UnknownPSSPolicyInterface;

class DefaultPolicy implements UnknownPSSPolicyInterface
{
    /**
     * Returns unknown PlayStatSummaryType
     * You can implement your policy and add some log functions
     * @param $stringCode
     * @return PlayerStatSummaryTypeInterface
     */
    public function getUnknownPlayStatSummaryType($stringCode)
    {
        return new Unknown($stringCode);
    }
}