<?php
namespace LolAPI\GameConstants\MatchmakingQueueType;

use LolAPI\GameConstants\MatchmakingQueue\Normal3x3;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\ARAM5x5;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\Ascension5x5;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\Bot5x5;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\Bot5x5Beginner;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\Bot5x5Intermediate;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\Bot5x5Intro;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\BotTT3x3;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\BotURF5x5;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\CounterPick;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\Custom;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\Firstblood1x1;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\Firstblood2x2;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\GroupFinder5x5;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\Hexakill;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\KingPoro5x5;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\NightmareBot5x5Rank1;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\NightmareBot5x5Rank2;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\NightmareBot5x5Rank5;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\Normal5x5Blind;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\Normal5x5Draft;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\Null;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\ODIN5x5Blind;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\ODIN5x5Draft;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\OneForAll5x5;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\RankedPremade3x3;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\RankedPremade5x5;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\RankedSolo5x5;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\RankedTeam3x3;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\RankedTeam5x5;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\SR6x6;
use LolAPI\GameConstants\MatchmakingQueueType\QueueTypes\URF5x5;

class MatchmakingQueueTypeFactory implements MatchmakingQueueTypeFactoryInterface
{
    /**
     * Policy for unknown MatchmakingQueueType
     * @var UnknownMQTPolicyInterface
     */
    private $unknownDataPolicy;

    /**
     * MatchmakingQueueType Factory
     * @param UnknownMQTPolicyInterface $unknownDataPolicy
     */
    public function __construct(UnknownMQTPolicyInterface $unknownDataPolicy)
    {
        $this->unknownDataPolicy = $unknownDataPolicy;
    }

    /**
     * Returns policy for unknown MatchmakingQueueType
     * @return UnknownMQTPolicyInterface
     */
    protected function getUnknownDataPolicy()
    {
        return $this->unknownDataPolicy;
    }

    /**
     * Create and returns MatchmakingQueueType constant from integer code
     * Factory will return a special NULL-case for $intCode (null)
     * @param int|null $intCode
     * @return MatchmakingQueueInterface
     */
    public function createFromIntCode($intCode)
    {
        if($intCode === null) {
            return new Null();
        }

        switch($intCode) {
            default:
                return $this->getUnknownDataPolicy()->getUnknownMatchmakingQueueType($intCode);

            case MatchmakingQueueInterface::QUEUE_TYPE_NORMAL_5x5_BLIND:
                return new Normal5x5Blind();

            CASE MatchmakingQueueInterface::QUEUE_TYPE_NORMAL_5x5_DRAFT:
                return new Normal5x5Draft();

            case MatchmakingQueueInterface::QUEUE_TYPE_NORMAL_3x3:
                return new Normal3x3();

            case MatchmakingQueueInterface::QUEUE_TYPE_RANKED_SOLO_5x5:
                return new RankedSolo5x5();

            case MatchmakingQueueInterface::QUEUE_TYPE_CUSTOM:
                return new Custom();

            case MatchmakingQueueInterface::QUEUE_TYPE_ARAM_5x5:
                return new ARAM5x5();

            case MatchmakingQueueInterface::QUEUE_TYPE_ODIN_5x5_BLIND:
                return new ODIN5x5Blind();

            case MatchmakingQueueInterface::QUEUE_TYPE_ODIN_5x5_DRAFT:
                return new ODIN5x5Draft();

            case MatchmakingQueueInterface::QUEUE_TYPE_RANKED_PREMADE_3x3:
                return new RankedPremade3x3();

            case MatchmakingQueueInterface::QUEUE_TYPE_RANKED_PREMADE_5x5:
                return new RankedPremade5x5();

            case MatchmakingQueueInterface::QUEUE_TYPE_RANKED_TEAM_5x5:
                return new RankedTeam5x5();

            case MatchmakingQueueInterface::QUEUE_TYPE_RANKED_TEAM_3x3:
                return new RankedTeam3x3();

            case MatchmakingQueueInterface::QUEUE_TYPE_GROUP_FINDER_5x5:
                return new GroupFinder5x5();

            case MatchmakingQueueInterface::QUEUE_TYPE_BOT_5x5_INTRO:
                return new Bot5x5Intro();

            case MatchmakingQueueInterface::QUEUE_TYPE_BOT_5x5_BEGINNER:
                return new Bot5x5Beginner();

            case MatchmakingQueueInterface::QUEUE_TYPE_BOT_5x5_INTERMEDIATE:
                return new Bot5x5Intermediate();

            case MatchmakingQueueInterface::QUEUE_TYPE_BOT_TT_3x3:
                return new BotTT3x3();

            case MatchmakingQueueInterface::QUEUE_TYPE_ONEFORALL_5x5:
                return new OneForAll5x5();

            case MatchmakingQueueInterface::QUEUE_TYPE_FIRSTBLOOD_1x1:
                return new Firstblood1x1();

            case MatchmakingQueueInterface::QUEUE_TYPE_FIRSTBLOOD_2x2:
                return new Firstblood2x2();

            case MatchmakingQueueInterface::QUEUE_TYPE_SR_6x6:
                return new SR6x6();

            case MatchmakingQueueInterface::QUEUE_TYPE_URF_5x5:
                return new URF5x5();

            case MatchmakingQueueInterface::QUEUE_TYPE_BOT_URF_5x5:
                return new BotURF5x5();

            case MatchmakingQueueInterface::QUEUE_TYPE_NIGHTMARE_BOT_5x5_RANK1:
                return new NightmareBot5x5Rank1();

            case MatchmakingQueueInterface::QUEUE_TYPE_NIGHTMARE_BOT_5x5_RANK2:
                return new NightmareBot5x5Rank2();

            case MatchmakingQueueInterface::QUEUE_TYPE_NIGHTMARE_BOT_5x5_RANK5:
                return new NightmareBot5x5Rank5();

            case MatchmakingQueueInterface::QUEUE_TYPE_ASCENSION_5x5:
                return new Ascension5x5();

            case MatchmakingQueueInterface::QUEUE_TYPE_HEXAKILL:
                return new Hexakill();

            case MatchmakingQueueInterface::QUEUE_TYPE_KING_PORO_5x5:
                return new KingPoro5x5();

            case MatchmakingQueueInterface::QUEUE_TYPE_COUNTER_PICK:
                return new CounterPick();

            case MatchmakingQueueInterface::QUEUE_TYPE_BOT_5x5:
                return new Bot5x5();
        }
    }
}