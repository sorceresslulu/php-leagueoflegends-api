<?php
namespace LolAPI\GameConstants\Platform\UnknownPlatformPolicy;

use LolAPI\GameConstants\Platform\PlatformInterface;
use LolAPI\GameConstants\Platform\Types\Unknown;
use LolAPI\GameConstants\Platform\UnknownPlatformPolicyInterface;

class DefaultPolicy implements UnknownPlatformPolicyInterface
{
    /**
     * Returns instance of "unknown" platform
     * You can implement your policy and add some log functions
     * @param string $platformStringCode
     * @return PlatformInterface
     */
    public function getUnknownPlatform($platformStringCode)
    {
        return new Unknown($platformStringCode);
    }
}