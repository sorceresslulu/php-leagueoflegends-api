<?php
namespace LolAPI\GameConstants\MapId;

use LolAPI\GameConstants\MapId\Maps\DominionMap;
use LolAPI\GameConstants\MapId\Maps\HowlingAbyss;
use LolAPI\GameConstants\MapId\Maps\OriginalAutumnSR;
use LolAPI\GameConstants\MapId\Maps\OriginalSummerSR;
use LolAPI\GameConstants\MapId\Maps\SR2014;
use LolAPI\GameConstants\MapId\Maps\TT2012;
use LolAPI\GameConstants\MapId\Maps\TTOriginal;
use LolAPI\GameConstants\MapId\Maps\TutorialMap;

class MapIdFactory implements MapIdFactoryInterface
{
    /**
     * Policy for unknown MapIds
     * @var UnknownMapIdPolicyInterface
     */
    private $unknownDataPolicy;


    /**
     * MapId Factory
     * @param UnknownMapIdPolicyInterface $unknownDataPolicy
     */
    public function __construct(UnknownMapIdPolicyInterface $unknownDataPolicy)
    {
        $this->unknownDataPolicy = $unknownDataPolicy;
    }

    /**
     * Returns policy for unknown MapIds
     * @return UnknownMapIdPolicyInterface
     */
    protected function getUnknownDataPolicy()
    {
        return $this->unknownDataPolicy;
    }

    /**
     * Create and returns MapId from integer code
     * @param int $intCode
     * @return MapIdInterface
     */
    public function createFromIntCode($intCode)
    {
        switch($intCode) {
            default:
                return $this->getUnknownDataPolicy()->getUnknownMapId($intCode);

            case MapIdInterface::MAP_ID_1:
                return new OriginalSummerSR();

            case MapIdInterface::MAP_ID_2:
                return new OriginalAutumnSR();

            case MapIdInterface::MAP_ID_3:
                return new TutorialMap();

            case MapIdInterface::MAP_ID_4:
                return new TTOriginal();

            case MapIdInterface::MAP_ID_8;
                return new DominionMap();

            case MapIdInterface::MAP_ID_10:
                return new TT2012();

            case MapIdInterface::MAP_ID_11:
                return new SR2014();

            case MapIdInterface::MAP_ID_12:
                return new HowlingAbyss();
        }
    }
}