<?php
namespace LolAPI\GameConstants\GameMode\UnknownDataPolicy;

use LolAPI\GameConstants\GameMode\GameModeInterface;
use LolAPI\GameConstants\GameMode\UnknownDataPolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownDataPolicyInterface
{
    /**
     * Throws OutOfBoundsException on unknown GameMode
     * @param string $stringCode
     * @return GameModeInterface
     */
    public function getUnknownGameMode($stringCode)
    {
        throw new \OutOfBoundsException(sprintf("Unknown game mode `%s`", $stringCode));
    }
}