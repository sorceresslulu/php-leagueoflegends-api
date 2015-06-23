<?php
namespace LolAPI\GameConstants\GameMode\UnknownGameModePolicy;

use LolAPI\GameConstants\GameMode\GameModeInterface;
use LolAPI\GameConstants\GameMode\Modes\Unknown;
use LolAPI\GameConstants\GameMode\UnknownGameModePolicyInterface;

class DefaultPolicy implements  UnknownGameModePolicyInterface
{
    /**
     * Returns unknown GameMode
     * You can implement your own policy for adding some logging functions
     * @param string $stringCode
     * @return GameModeInterface
     */
    public function getUnknownGameMode($stringCode)
    {
        return new Unknown($stringCode);
    }
}