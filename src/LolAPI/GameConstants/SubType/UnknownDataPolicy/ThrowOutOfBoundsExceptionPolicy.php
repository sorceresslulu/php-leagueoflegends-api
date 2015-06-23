<?php
namespace LolAPI\GameConstants\SubType\UnknownDataPolicy;

use LolAPI\GameConstants\Platform\PlatformInterface;
use LolAPI\GameConstants\Platform\UnknownDataPolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownDataPolicyInterface
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