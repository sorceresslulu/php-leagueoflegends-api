<?php
namespace LolAPI\GameConstants\Platform;

use LolAPI\GameConstants\Platform\PlatformInterface;
use LolAPI\GameConstants\Platform\Types\BR1;
use LolAPI\GameConstants\Platform\Types\EUN1;
use LolAPI\GameConstants\Platform\Types\EUW1;
use LolAPI\GameConstants\Platform\Types\KR;
use LolAPI\GameConstants\Platform\Types\LA1;
use LolAPI\GameConstants\Platform\Types\LA2;
use LolAPI\GameConstants\Platform\Types\NA1;
use LolAPI\GameConstants\Platform\Types\OC1;
use LolAPI\GameConstants\Platform\Types\TR1;
use LolAPI\GameConstants\Platform\Types\RU;
use LolAPI\GameConstants\Platform\Types\Unknown;
use LolAPI\GameConstants\Platform\UnknownPlatformPolicyInterface;

class PlatformFactory
{
    /**
     * Policy for unknown platforms
     * @var UnknownPlatformPolicyInterface
     */
    private $unknownDataPolicy;

    /**
     * Platform factory
     * @param UnknownPlatformPolicyInterface $unknownDataPolicy
     */
    public function __construct(UnknownPlatformPolicyInterface $unknownDataPolicy)
    {
        $this->unknownDataPolicy = $unknownDataPolicy;
    }

    /**
     * Returns policy for unknown platforms
     * @return UnknownPlatformPolicyInterface
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

            case \LolAPI\GameConstants\Platform\PlatformInterface::PLATFORM_LA1:
                return new LA1();

            case \LolAPI\GameConstants\Platform\PlatformInterface::PLATFORM_LA2:
                return new LA2();

            case PlatformInterface::PLATFORM_NA1:
                return new NA1();

            case \LolAPI\GameConstants\Platform\PlatformInterface::PLATFORM_OC1:
                return new OC1();

            case \LolAPI\GameConstants\Platform\PlatformInterface::PLATFORM_RU:
                return new RU();

            case \LolAPI\GameConstants\Platform\PlatformInterface::PLATFORM_TR1:
                return new TR1();
        }
    }
}