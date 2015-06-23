<?php
namespace LolAPI\GameConstants\MapId;

interface UnknownMapIdPolicyInterface
{
    /**
     * Create and returns mapId for unknown constants
     * You can implement your own policy to add some logging functions
     * @param int $intCode
     * @return MapIdInterface
     */
    public function getUnknownMapId($intCode);
}