<?php
namespace LolAPI\GameConstants\SubType\UnknownDataPolicy;

use LolAPI\Platform\PlatformInterface;
use LolAPI\Platform\UnknownDataPolicyInterface;

class ThrowOutOfBoundExceptionPolicy implements UnknownDataPolicyInterface
{
    /**
     * Throw OutOfBoundExceptions instead of returning "unknown" platform
     * @param string $platformStringCode
     * @return PlatformInterface
     */
    public function getUnknownPlatform($platformStringCode)
    {
        throw new \OutOfBoundsException(sprintf("Unknown subType with code `%s`", $stringCode));
    }
}