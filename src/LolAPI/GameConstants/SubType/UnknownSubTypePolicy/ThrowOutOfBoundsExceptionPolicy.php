<?php
namespace LolAPI\GameConstants\SubType\UnknownSubTypePolicy;

use LolAPI\GameConstants\Platform\PlatformInterface;
use LolAPI\GameConstants\Platform\UnknownPlatformPolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownPlatformPolicyInterface
{
    /**
     * Throw OutOfBoundExceptions instead of returning "unknown" platform
     * @param string $platformStringCode
     * @return \LolAPI\GameConstants\Platform\PlatformInterface
     */
    public function getUnknownPlatform($platformStringCode)
    {
        throw new \OutOfBoundsException(sprintf("Unknown subType with code `%s`", $platformStringCode));
    }
}