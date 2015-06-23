<?php
namespace LolAPI\GameConstants\Platform;

use LolAPI\GameConstants\Platform\PlatformInterface;

interface UnknownPlatformPolicyInterface
{
    /**
     * Returns instance of "unknown" platform
     * You can implement your policy and add some log functions
     * @param string $platformStringCode
     * @return PlatformInterface
     */
    public function getUnknownPlatform($platformStringCode);
}