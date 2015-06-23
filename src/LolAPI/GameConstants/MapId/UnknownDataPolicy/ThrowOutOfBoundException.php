<?php
namespace LolAPI\GameConstants\MapId\UnknownDataPolicy;

use LolAPI\GameConstants\MapId\MapIdInterface;
use LolAPI\GameConstants\MapId\UnknownDataPolicyInterface;

class ThrowOutOfBoundException implements UnknownDataPolicyInterface
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