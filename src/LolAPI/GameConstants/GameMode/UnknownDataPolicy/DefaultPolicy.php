<?php
namespace LolAPI\GameConstants\GameMode\UnknownDataPolicy;

use LolAPI\GameConstants\GameMode\GameModeInterface;
use LolAPI\GameConstants\GameMode\Modes\Unknown;
use LolAPI\GameConstants\GameMode\UnknownDataPolicyInterface;

class DefaultPolicy implements  UnknownDataPolicyInterface
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