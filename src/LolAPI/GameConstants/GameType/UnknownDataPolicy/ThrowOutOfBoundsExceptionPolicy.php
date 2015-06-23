<?php
namespace LolAPI\GameConstants\GameType\UnknownDataPolicy;

use LolAPI\GameConstants\GameType\GameTypeInterface;
use LolAPI\GameConstants\GameType\UnknownDataPolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownDataPolicyInterface
{
    /**
     * Throws OutOfBoundsException on unknown GameType
     * @param string $stringCode
     * @return GameTypeInterface
     */
    public function getUnknownGameType($stringCode)
    {
        throw new \OutOfBoundsException(sprintf("Unknown game type `%s`", $stringCode));
    }
}