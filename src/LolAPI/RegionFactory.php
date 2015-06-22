<?php
namespace LolAPI;

use LolAPI\Region\EUW;
use LolAPI\Region\NA;
use LolAPI\Region\RU;

class RegionFactory
{
    /**
     * Create and returns region from code
     * @param string $code
     * @return Region
     */
    public static function getRegionByCode($code)
    {
        if(!(is_string($code)) || !(strlen($code)) || strlen($code) > 6) {
            throw new \InvalidArgumentException;
        }

        switch(strtolower($code)) {
            default:
                throw new \OutOfBoundsException(sprintf("Region `%s` not found", $code));

            case 'ru':
                return new RU();

            case 'euw':
                return new EUW();

            case 'na':
                return new NA();
        }
    }
}