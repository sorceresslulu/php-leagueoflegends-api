<?php
namespace LolAPI\Region;

use LolAPI\Region;
use LolAPI\Region\Regions\BR;
use LolAPI\Region\Regions\EUNE;
use LolAPI\Region\Regions\EUW;
use LolAPI\Region\Regions\KR;
use LolAPI\Region\Regions\LAN;
use LolAPI\Region\Regions\LAS;
use LolAPI\Region\Regions\NA;
use LolAPI\Region\Regions\OCE;
use LolAPI\Region\Regions\PBE;
use LolAPI\Region\Regions\RU;
use LolAPI\Region\Regions\TR;

class RegionFactory
{
    /**
     * Policy for unknown region
     * @var UnknownRegionPolicyInterface
     */
    private $unknownRegionPolicy;

    /**
     * Region Factory
     * @param UnknownRegionPolicyInterface $unknownRegionPolicy
     */
    public function __construct(UnknownRegionPolicyInterface $unknownRegionPolicy)
    {
        $this->unknownRegionPolicy = $unknownRegionPolicy;
    }

    /**
     * Returns policy for unknown region
     * @return UnknownRegionPolicyInterface
     */
    protected function getUnknownRegionPolicy()
    {
        return $this->unknownRegionPolicy;
    }

    /**
     * Create and returns region from string code
     * @param string $regionStringCode
     * @return RegionInterface
     */
    public function getRegionByStringCode($regionStringCode)
    {
        if(!(is_string($regionStringCode)) || !(strlen($regionStringCode)) || strlen($regionStringCode) > 6) {
            throw new \InvalidArgumentException;
        }

        switch(strtolower($regionStringCode)) {
            default:
                return $this->getUnknownRegionPolicy()->getUnknownRegion($regionStringCode);

            case RegionInterface::REGION_BR:
                return new BR();

            case RegionInterface::REGION_EUNE:
                return new EUNE();

            case RegionInterface::REGION_EUW:
                return new EUW();

            case RegionInterface::REGION_KR:
                return new KR();

            case RegionInterface::REGION_LAN:
                return new LAN();

            case RegionInterface::REGION_LAS:
                return new LAS();

            case RegionInterface::REGION_NA:
                return new NA();

            case RegionInterface::REGION_OCE:
                return new OCE();

            case RegionInterface::REGION_PBE:
                return new PBE();

            case RegionInterface::REGION_RU:
                return new RU();

            case RegionInterface::REGION_TR:
                return new TR();
        }
    }
}