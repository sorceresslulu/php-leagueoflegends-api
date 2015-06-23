<?php
namespace LolAPI\GameConstants\GameMode\UnknownGameModePolicy;

use LolAPI\GameConstants\GameMode\GameModeInterface;
use LolAPI\GameConstants\GameMode\UnknownGameModePolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownGameModePolicyInterface
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