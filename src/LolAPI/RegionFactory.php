<?php
namespace LolAPI;

use LolAPI\Region\BR;
use LolAPI\Region\EUNE;
use LolAPI\Region\EUW;
use LolAPI\Region\KR;
use LolAPI\Region\LAN;
use LolAPI\Region\LAS;
use LolAPI\Region\NA;
use LolAPI\Region\OCE;
use LolAPI\Region\PBE;
use LolAPI\Region\RU;
use LolAPI\Region\TR;

class RegionFactory
{
    /**
     * Create and returns region from string code
     * @param string $stringCode
     * @param bool $throwExceptionsOnUnknownCode
     * @return Region
     */
    public static function getRegionByStringCode($stringCode, $throwExceptionsOnUnknownCode = false)
    {
        if(!(is_string($stringCode)) || !(strlen($stringCode)) || strlen($stringCode) > 6) {
            throw new \InvalidArgumentException;
        }

        switch(strtolower($stringCode)) {
            default:
                if($throwExceptionsOnUnknownCode) {
                    throw new \OutOfBoundsException(sprintf("Region `%s` not found", $stringCode));
                }else{
                    return new Region\Unknown($stringCode);
                }

                case Region::REGION_BR:
                    return new BR();

                case Region::REGION_EUNE:
                    return new EUNE();

                case Region::REGION_EUW:
                    return new EUW();

                case Region::REGION_KR:
                    return new KR();

                case Region::REGION_LAN:
                    return new LAN();

                case Region::REGION_LAS:
                    return new LAS();

                case Region::REGION_NA:
                    return new NA();

                case Region::REGION_OCE:
                    return new OCE();

                case Region::REGION_PBE:
                    return new PBE();

                case Region::REGION_RU:
                    return new RU();

                case Region::REGION_TR:
                    return new TR();
        }
    }
}