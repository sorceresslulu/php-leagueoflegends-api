<?php
namespace LolAPI\GameConstants\SubType;

interface UnknownDataPolicyInterface
{
    /**
     * Returns unknown SubType
     * You can implement your policy and add some log functions
     * @param string $subTypeStringCode
     * @return SubTypeInterface
     */
    public function getUnknownSubType($subTypeStringCode);
}