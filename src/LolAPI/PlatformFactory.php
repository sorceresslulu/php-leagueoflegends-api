<?php
namespace LolAPI;

use LolAPI\Platform\BR1;
use LolAPI\Platform\EUN1;
use LolAPI\Platform\EUW1;
use LolAPI\Platform\KR;
use LolAPI\Platform\LA1;
use LolAPI\Platform\LA2;
use LolAPI\Platform\NA1;
use LolAPI\Platform\OC1;
use LolAPI\Platform\TR1;
use LolAPI\Platform\RU;
use LolAPI\Platform\Unknown;

class PlatformFactory
{
    /**
     * Create and returns platform from string code
     * @param $stringCode
     * @param bool $throwExceptionsOnUnknownCode
     * @return Platform
     */
    public static function createFromStringCode($stringCode, $throwExceptionsOnUnknownCode = false)
    {
        switch(strtoupper($stringCode)) {
            default:
                if($throwExceptionsOnUnknownCode) {
                    throw new \OutOfBoundsException(sprintf("Unknown platform with code `%s`", $stringCode));
                }else{
                    return new Unknown($stringCode);
                }

            case Platform::PLATFORM_BR1:
                return new BR1();

            case Platform::PLATFORM_EUN1:
                return new EUN1();

            case Platform::PLATFORM_EUW1:
                return new EUW1();

            case Platform::PLATFORM_KR:
                return new KR();

            case Platform::PLATFORM_LA1:
                return new LA1();

            case Platform::PLATFORM_LA2:
                return new LA2();

            case Platform::PLATFORM_NA1:
                return new NA1();

            case Platform::PLATFORM_OC1:
                return new OC1();

            case Platform::PLATFORM_RU:
                return new RU();

            case Platform::PLATFORM_TR1:
                return new TR1();
        }
    }
}