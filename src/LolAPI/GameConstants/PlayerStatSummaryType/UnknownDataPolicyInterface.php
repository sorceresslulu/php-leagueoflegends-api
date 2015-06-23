<?php
namespace LolAPI\GameConstants\PlayerStatSummaryType;

interface UnknownDataPolicyInterface
{
    /**
     * Returns unknown PlayStatSummaryType
     * You can implement your policy and add some log functions
     * @param $stringCode
     * @return PlayerStatSummaryTypeInterface
     */
    public function getUnknownPlayStatSummaryType($stringCode);
}