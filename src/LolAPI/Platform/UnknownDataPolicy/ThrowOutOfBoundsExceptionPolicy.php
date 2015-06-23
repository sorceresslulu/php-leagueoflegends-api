<?php
namespace LolAPI\Platform\UnknownDataPolicy;

use LolAPI\Platform\PlatformInterface;
use LolAPI\Platform\UnknownDataPolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownDataPolicyInterface
{
    /**
     * Throw an OutOfBound exception on unknown platforms
     * @param string $platformStringCode
     * @return PlatformInterface
     */
    public function getUnknownPlatform($platformStringCode)
    {
        throw new \OutOfBoundsException(sprintf("Unknown platform with code `%s`", $platformStringCode));
    }
}