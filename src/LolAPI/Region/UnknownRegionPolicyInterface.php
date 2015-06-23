<?php
namespace LolAPI\Region;

interface UnknownRegionPolicyInterface
{
    /**
     * Returns "Unknown" region
     * You can implement and inject your own policy in your application to handle with unknown region like you need
     * @param $regionStringCode
     * @return RegionInterface
     */
    public function getUnknownRegion($regionStringCode);
}