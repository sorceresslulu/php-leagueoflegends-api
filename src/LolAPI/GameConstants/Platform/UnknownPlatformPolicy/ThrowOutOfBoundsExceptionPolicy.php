<?php
namespace LolAPI\GameConstants\Platform\UnknownPlatformPolicy;

use LolAPI\GameConstants\Platform\PlatformInterface;
use LolAPI\GameConstants\Platform\UnknownPlatformPolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownPlatformPolicyInterface
{
    /**
     * Throw an OutOfBound exception on unknown platforms
     * @param string $platformStringCode
     * @return \LolAPI\GameConstants\Platform\PlatformInterface
     */
    public function getUnknownPlatform($platformStringCode)
    {
        throw new \OutOfBoundsException(sprintf("Unknown platform with code `%s`", $platformStringCode));
    }
}