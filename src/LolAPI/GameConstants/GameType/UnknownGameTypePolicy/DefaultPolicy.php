<?php
namespace LolAPI\GameConstants\GameType\UnknownGameTypePolicy;

use LolAPI\GameConstants\GameType\GameTypeInterface;
use LolAPI\GameConstants\GameType\Types\Unknown;
use LolAPI\GameConstants\GameType\UnknownGameTypePolicyInterface;

class DefaultPolicy implements UnknownGameTypePolicyInterface
{
    /**
     * Returns unknown GameType
     * Implement your own policy for adding some logging functions
     * @param string $stringCode
     * @return GameTypeInterface
     */
    public function getUnknownGameType($stringCode)
    {
        return new Unknown($stringCode);
    }
}