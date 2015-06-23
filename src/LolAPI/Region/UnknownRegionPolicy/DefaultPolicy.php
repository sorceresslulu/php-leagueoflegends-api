<?php
namespace LolAPI\Region\UnknownRegionPolicy;

use LolAPI\Region\RegionInterface;
use LolAPI\Region\Regions\UnknownRegion;
use LolAPI\Region\UnknownRegionPolicyInterface;

class DefaultPolicy implements UnknownRegionPolicyInterface
{
    /**
     * Returns "Unknown" region
     * You can implement and inject your own policy in your application to handle with unknown region like you need
     * @param $regionStringCode
     * @return RegionInterface
     */
    public function getUnknownRegion($regionStringCode)
    {
        return new UnknownRegion($regionStringCode);
    }
}