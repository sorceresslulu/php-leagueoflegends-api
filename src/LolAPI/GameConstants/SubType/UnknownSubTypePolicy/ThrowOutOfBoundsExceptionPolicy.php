<?php
namespace LolAPI\GameConstants\SubType\UnknownSubTypePolicy;

use LolAPI\GameConstants\SubType\SubTypeInterface;
use LolAPI\GameConstants\SubType\UnknownSubTypePolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownSubTypePolicyInterface
{
    /**
     * Throws OutOfBoundsException on unknown subTypes
     * @param string $subTypeStringCode
     * @return SubTypeInterface
     */
    public function getUnknownSubType($subTypeStringCode)
    {
        throw new \OutOfBoundsException(sprintf("Unknown subType with code `%s`", $subTypeStringCode));
    }
}