<?php
namespace LolAPI\GameConstants\Platform\UnknownDataPolicy;

use LolAPI\GameConstants\Platform\PlatformInterface;
use LolAPI\GameConstants\Platform\UnknownDataPolicyInterface;

class ThrowOutOfBoundsExceptionPolicy implements UnknownDataPolicyInterface
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