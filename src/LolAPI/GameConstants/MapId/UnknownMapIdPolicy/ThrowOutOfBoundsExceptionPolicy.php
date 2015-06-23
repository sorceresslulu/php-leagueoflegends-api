<?php
namespace LolAPI\GameConstants\MapId\UnknownMapIdPolicy;

use LolAPI\GameConstants\MapId\MapIdInterface;
use LolAPI\GameConstants\MapId\UnknownMapIdPolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownMapIdPolicyInterface
{
    /**
     * Throws OutOfBoundsException on unknown mapIds
     * @param int $intCode
     * @return MapIdInterface
     */
    public function getUnknownMapId($intCode)
    {
        throw new \OutOfBoundsException(sprintf("Unknown map with ID `%d`", $intCode));
    }

}