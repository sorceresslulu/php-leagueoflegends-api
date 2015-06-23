<?php
namespace LolAPI\GameConstants\SubType;

use LolAPI\GameConstants\SubType\SubTypes\ARAMUnranked5x5;
use LolAPI\GameConstants\SubType\SubTypes\Ascension;
use LolAPI\GameConstants\SubType\SubTypes\Bot;
use LolAPI\GameConstants\SubType\SubTypes\Bot3x3;
use LolAPI\GameConstants\SubType\SubTypes\CAP5x5;
use LolAPI\GameConstants\SubType\SubTypes\CounterPick;
use LolAPI\GameConstants\SubType\SubTypes\Firstblood1x1;
use LolAPI\GameConstants\SubType\SubTypes\Firstblood2x2;
use LolAPI\GameConstants\SubType\SubTypes\Hexakill;
use LolAPI\GameConstants\SubType\SubTypes\KingPoro;
use LolAPI\GameConstants\SubType\SubTypes\NightmareBot;
use LolAPI\GameConstants\SubType\SubTypes\Normal3x3;
use LolAPI\GameConstants\SubType\SubTypes\None;
use LolAPI\GameConstants\SubType\SubTypes\Normal;
use LolAPI\GameConstants\SubType\SubTypes\ODINUnranked;
use LolAPI\GameConstants\SubType\SubTypes\OneForAll5x5;
use LolAPI\GameConstants\SubType\SubTypes\RankedSolo5x5;
use LolAPI\GameConstants\SubType\SubTypes\RankedTeam3x3;
use LolAPI\GameConstants\SubType\SubTypes\RankedTeam5x5;
use LolAPI\GameConstants\SubType\SubTypes\SR6x6;
use LolAPI\GameConstants\SubType\SubTypes\URF;
use LolAPI\GameConstants\SubType\SubTypes\URFBot;

class Factory
{
    /**
     * Policy for unknown SubTypes
     * @var UnknownDataPolicyInterface
     */
    private $unknownDataPolicy;

    /**
     * SubType Factory
     * @param UnknownDataPolicyInterface $unknownDataPolicy
     */
    public function __construct(UnknownDataPolicyInterface $unknownDataPolicy)
    {
        $this->unknownDataPolicy = $unknownDataPolicy;
    }

    /**
     * Return policy for unknown SubTypes
     * @return UnknownDataPolicyInterface
     */
    protected function getUnknownDataPolicy()
    {
        return $this->unknownDataPolicy;
    }

    /**
     * Create and returns subType from string code
     * @param string $stringCode
     * @return SubTypeInterface;
     */
    public function createFromStringCode($stringCode)
    {
        switch($stringCode) {
            default:
                return $this->getUnknownDataPolicy()->getUnknownSubType($stringCode);

            case SubTypeInterface::SUB_TYPE_NONE:
                return new None();

            case SubTypeInterface::SUB_TYPE_NORMAL:
                return new Normal();

            case SubTypeInterface::SUB_TYPE_NORMAL_3x3:
                return new Normal3x3();

            case SubTypeInterface::SUB_TYPE_ODIN_UNRANKED:
                return new ODINUnranked();

            case SubTypeInterface::SUB_TYPE_ARAM_UNRANKED_5x5:
                return new ARAMUnranked5x5();

            case SubTypeInterface::SUB_TYPE_BOT:
                return new Bot();

            case SubTypeInterface::SUB_TYPE_BOT_3x3:
                return new Bot3x3();

            case SubTypeInterface::SUB_TYPE_RANKED_SOLO_5x5:
                return new RankedSolo5x5();

            case SubTypeInterface::SUB_TYPE_RANKED_TEAM_3x3:
                return new RankedTeam3x3();

            case SubTypeInterface::SUB_TYPE_RANKED_TEAM_5x5:
                return new RankedTeam5x5();

            case SubTypeInterface::SUB_TYPE_ONEFORALL_5x5:
                return new OneForAll5x5();

            case SubTypeInterface::SUB_TYPE_FIRSTBLOOD_1x1:
                return new Firstblood1x1();

            case SubTypeInterface::SUB_TYPE_FIRSTBLOOD_2x2:
                return new Firstblood2x2();

            case SubTypeInterface::SUB_TYPE_SR_6x6:
                return new SR6x6();

            case SubTypeInterface::SUB_TYPE_CAP_5x5:
                return new CAP5x5();

            case SubTypeInterface::SUB_TYPE_URF:
                return new URF();

            case SubTypeInterface::SUB_TYPE_URF_BOT:
                return new URFBot();

            case SubTypeInterface::SUB_TYPE_NIGHTMARE_BOT:
                return new NightmareBot();

            case SubTypeInterface::SUB_TYPE_ASCENSION:
                return new Ascension();

            case SubTypeInterface::SUB_TYPE_HEXAKILL:
                return new Hexakill();

            case SubTypeInterface::SUB_TYPE_KING_PORO:
                return new KingPoro();

            case SubTypeInterface::SUB_TYPE_COUNTER_PICK:
                return new CounterPick();
        }
    }
}