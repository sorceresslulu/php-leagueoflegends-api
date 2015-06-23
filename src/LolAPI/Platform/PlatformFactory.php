<?php
namespace LolAPI\Platform;

use LolAPI\Platform\PlatformInterface;
use LolAPI\Platform\Types\BR1;
use LolAPI\Platform\Types\EUN1;
use LolAPI\Platform\Types\EUW1;
use LolAPI\Platform\Types\KR;
use LolAPI\Platform\Types\LA1;
use LolAPI\Platform\Types\LA2;
use LolAPI\Platform\Types\NA1;
use LolAPI\Platform\Types\OC1;
use LolAPI\Platform\Types\TR1;
use LolAPI\Platform\Types\RU;
use LolAPI\Platform\Types\Unknown;

class PlatformFactory
{
    /**
     * Policy for unknown platforms
     * @var UnknownDataPolicyInterface
     */
    private $unknownDataPolicy;

    /**
     * Platform factory
     * @param UnknownDataPolicyInterface $unknownDataPolicy
     */
    public function __construct(UnknownDataPolicyInterface $unknownDataPolicy)
    {
        $this->unknownDataPolicy = $unknownDataPolicy;
    }

    /**
     * Returns policy for unknown platforms
     * @return UnknownDataPolicyInterface
     */
    protected function getUnknownDataPolicy()
    {
        return $this->unknownDataPolicy;
    }

    /**
     * Create and returns platform from string code
     * @param $stringCode
     * @param bool $throwExceptionsOnUnknownCode
     * @return PlatformInterface
     */
    public function createFromStringCode($stringCode, $throwExceptionsOnUnknownCode = false)
    {
        switch(strtoupper($stringCode)) {
            default:
                return $this->getUnknownDataPolicy()->getUnknownPlatform($stringCode);

            case PlatformInterface::PLATFORM_BR1:
                return new BR1();

            case PlatformInterface::PLATFORM_EUN1:
                return new EUN1();

            case PlatformInterface::PLATFORM_EUW1:
                return new EUW1();

            case PlatformInterface::PLATFORM_KR:
                return new KR();

            case PlatformInterface::PLATFORM_LA1:
                return new LA1();

            case PlatformInterface::PLATFORM_LA2:
                return new LA2();

            case PlatformInterface::PLATFORM_NA1:
                return new NA1();

            case PlatformInterface::PLATFORM_OC1:
                return new OC1();

            case PlatformInterface::PLATFORM_RU:
                return new RU();

            case PlatformInterface::PLATFORM_TR1:
                return new TR1();
        }
    }
}