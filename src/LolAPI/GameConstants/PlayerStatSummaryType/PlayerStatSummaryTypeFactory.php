<?php
namespace LolAPI\GameConstants\PlayerStatSummaryType;

use LolAPI\GameConstants\PlayerStatSummaryType\Types\ARAMUnranked5x5;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\Ascension;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\CAP5x5;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\COOPVsAI;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\COOPVsAI3x3;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\CounterPick;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\Hexakill;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\KingPoro;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\NightmareBot;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\ODINUnranked;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\OneForAll5x5;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\RankedTeam5x5;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\SummonerRift6x6;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\Unranked;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\Unranked3x3;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\RankedSolo5x5;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\RankedTeam3x3;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\URF;
use LolAPI\GameConstants\PlayerStatSummaryType\Types\URFBots;

class PlayerStatSummaryTypeFactory
{
    /**
     * Policy for unknown PlayerStatSummaryType
     * @var UnknownDataPolicyInterface
     */
    private $unknownDataPolicy;

    /**
     * PlayerStatSummaryType Factory
     * @param UnknownDataPolicyInterface $unknownDataPolicy
     */
    public function __construct(UnknownDataPolicyInterface $unknownDataPolicy)
    {
        $this->unknownDataPolicy = $unknownDataPolicy;
    }

    /**
     * Returns policy for unknown PlayerStatSummaryType
     * @return UnknownDataPolicyInterface
     */
    protected function getUnknownDataPolicy()
    {
        return $this->unknownDataPolicy;
    }

    /**
     * Create and returns PlayerStatSummaryType from string code
     * @param $stringCode
     * @return PlayerStatSummaryTypeInterface
     */
    public function createFromStringCode($stringCode)
    {
        switch($stringCode) {
            default:
                return $this->getUnknownDataPolicy()->getUnknownPlayStatSummaryType($stringCode);

            case PlayerStatSummaryTypeInterface::TYPE_UNRANKED:
                return new Unranked();

            case PlayerStatSummaryTypeInterface::TYPE_UNRANKED_3X3:
                return new Unranked3x3();

            case PlayerStatSummaryTypeInterface::TYPE_ODIN_UNRANKED:
                return new ODINUnranked();

            case PlayerStatSummaryTypeInterface::TYPE_ARAM_UNRANKED_5X5:
                return new ARAMUnranked5x5();

            case PlayerStatSummaryTypeInterface::TYPE_COOP_VS_AI:
                return new COOPVsAI();

            case PlayerStatSummaryTypeInterface::TYPE_COOP_VS_AI_3X3;
                return new COOPVsAI3x3();

            case PlayerStatSummaryTypeInterface::TYPE_RANKED_SOLO_5X5:
                return new RankedSolo5x5();

            case PlayerStatSummaryTypeInterface::TYPE_RANKED_TEAM_3X3:
                return new RankedTeam3x3();

            case PlayerStatSummaryTypeInterface::TYPE_RANKED_TEAM_5X5:
                return new RankedTeam5x5();

            case PlayerStatSummaryTypeInterface::TYPE_ONE_FOR_ALL_5X5:
                return new OneForAll5x5();

            case PlayerStatSummaryTypeInterface::TYPE_FIRST_BLOOD_1X1:
                return new FirstBlood1x1();

            case PlayerStatSummaryTypeInterface::TYPE_FIRST_BLOOD_2X2:
                return new FirstBlood2x2();

            case PlayerStatSummaryTypeInterface::TYPE_SUMMONERS_RIFT_6X6:
                return new SummonerRift6x6();

            case PlayerStatSummaryTypeInterface::TYPE_CAP_5X5:
                return new CAP5x5();

            case PlayerStatSummaryTypeInterface::TYPE_URF:
                return new URF();

            case PlayerStatSummaryTypeInterface::TYPE_URF_BOTS:
                return new URFBots();

            case PlayerStatSummaryTypeInterface::TYPE_NIGHTMARE_BOT:
                return new NightmareBot();

            case PlayerStatSummaryTypeInterface::TYPE_ASCENSION:
                return new Ascension();

            case PlayerStatSummaryTypeInterface::TYPE_HEXAKILL:
                return new Hexakill();

            case PlayerStatSummaryTypeInterface::TYPE_KING_PORO:
                return new KingPoro();

            case PlayerStatSummaryTypeInterface::TYPE_COUNTER_PICK:
                return new CounterPick();
        }
    }
}