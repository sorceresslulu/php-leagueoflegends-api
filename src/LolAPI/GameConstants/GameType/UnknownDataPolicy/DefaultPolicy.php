<?php
namespace LolAPI\GameConstants\GameType\UnknownDataPolicy;

use LolAPI\GameConstants\GameType\GameTypeInterface;
use LolAPI\GameConstants\GameType\Types\Unknown;
use LolAPI\GameConstants\GameType\UnknownDataPolicyInterface;

class DefaultPolicy implements UnknownDataPolicyInterface
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