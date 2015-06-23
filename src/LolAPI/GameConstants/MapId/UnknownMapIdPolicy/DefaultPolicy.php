<?php
namespace LolAPI\GameConstants\MapId\UnknownMapIdPolicy;

use LolAPI\GameConstants\MapId\MapIdInterface;
use LolAPI\GameConstants\MapId\Maps\Unknown;
use LolAPI\GameConstants\MapId\UnknownMapIdPolicyInterface;

class DefaultPolicy implements UnknownMapIdPolicyInterface
{
    /**
     * Create and returns mapId for unknown constants
     * You can implement your own policy to add some logging functions
     * @param int $intCode
     * @return MapIdInterface
     */
    public function getUnknownMapId($intCode)
    {
        return new Unknown($intCode);
    }
}