<?php
namespace LolAPI\GameConstants\SubType\UnknownSubTypePolicy;

use LolAPI\GameConstants\SubType\SubTypeInterface;
use LolAPI\GameConstants\SubType\SubTypes\Unknown;
use LolAPI\GameConstants\SubType\UnknownSubTypePolicyInterface;

class DefaultPolicy implements UnknownSubTypePolicyInterface
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