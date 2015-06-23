<?php
namespace LolAPI\GameConstants\SubType\UnknownDataPolicy;

use LolAPI\GameConstants\SubType\SubTypeInterface;
use LolAPI\GameConstants\SubType\SubTypes\Unknown;
use LolAPI\GameConstants\SubType\UnknownDataPolicyInterface;

class DefaultPolicy implements UnknownDataPolicyInterface
{
    /**
     * Returns unknown SubType
     * You can implement your policy and add some log functions
     * @param string $subTypeStringCode
     * @return SubTypeInterface
     */
    public function getUnknownSubType($subTypeStringCode)
    {
        return new Unknown($subTypeStringCode);
    }
}