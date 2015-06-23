<?php
namespace LolAPI\GameConstants\MapId\UnknownDataPolicy;

use LolAPI\GameConstants\MapId\MapIdInterface;
use LolAPI\GameConstants\MapId\Maps\Unknown;
use LolAPI\GameConstants\MapId\UnknownDataPolicyInterface;

class DefaultPolicy implements UnknownDataPolicyInterface
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