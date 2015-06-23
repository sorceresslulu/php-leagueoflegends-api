<?php
namespace LolAPI\GameConstants\GameType;

interface UnknownDataPolicyInterface
{
    /**
     * Returns unknown GameType
     * Implement your own policy for adding some logging functions
     * @param string $stringCode
     * @return GameTypeInterface
     */
    public function getUnknownGameType($stringCode);
}