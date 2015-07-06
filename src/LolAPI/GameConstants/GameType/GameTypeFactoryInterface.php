<?php
namespace LolAPI\GameConstants\GameType;

interface GameTypeFactoryInterface
{
    /**
     * Returns policy for unknown GameType
     * @return UnknownGameTypePolicyInterface
     */
    public function getUnknownDataPolicy();

    /**
     * Create and returns GameType from string code
     * @param $stringCode
     * @return GameTypeInterface
     */
    public function createFromStringCode($stringCode);
}