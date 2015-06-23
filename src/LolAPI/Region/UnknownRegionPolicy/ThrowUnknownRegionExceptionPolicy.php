<?php
namespace LolAPI\Region\UnknownRegionPolicy;

use LolAPI\Exceptions\UnknownRegionException;
use LolAPI\Region\RegionInterface;
use LolAPI\Region\UnknownRegionPolicyInterface;

class ThrowUnknownRegionExceptionPolicy implements UnknownRegionPolicyInterface
{
    /**
     * Throw UnknownRegionException instead of returning "unknown" region
     * @param $regionStringCode
     * @return RegionInterface
     * @throws UnknownRegionException
     */
    public function getUnknownRegion($regionStringCode)
    {
        throw new UnknownRegionException(sprintf("Region `%s` not found", $regionStringCode));
    }

}