<?php
namespace LolAPI\GameConstants\GameType\UnknownGameTypePolicy;

use LolAPI\GameConstants\GameType\GameTypeInterface;
use LolAPI\GameConstants\GameType\UnknownGameTypePolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownGameTypePolicyInterface
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