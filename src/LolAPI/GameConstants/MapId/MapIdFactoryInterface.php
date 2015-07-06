<?php
namespace LolAPI\GameConstants\MapId;

interface MapIdFactoryInterface
{
    /**
     * Create and returns MapId from integer code
     * @param int $intCode
     * @return MapIdInterface
     */
    public function createFromIntCode($intCode);
}