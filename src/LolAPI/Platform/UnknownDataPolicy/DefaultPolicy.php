<?php
namespace LolAPI\Platform\UnknownDataPolicy;

use LolAPI\Platform\PlatformInterface;
use LolAPI\Platform\Types\Unknown;
use LolAPI\Platform\UnknownDataPolicyInterface;

class DefaultPolicy implements UnknownDataPolicyInterface
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