<?php
namespace LolAPI\Platform;

interface UnknownDataPolicyInterface
{
    /**
     * Returns instance of "unknown" platform
     * You can implement your policy and add some log functions
     * @param string $platformStringCode
     * @return PlatformInterface
     */
    public function getUnknownPlatform($platformStringCode);
}