<?php
namespace LolAPI\GameConstants\MatchmakingQueueType;

interface MatchmakingQueueInterface
{
    const QUEUE_TYPE_CUSTOM = 0;
    const QUEUE_TYPE_NORMAL_5x5_BLIND = 2;
    const QUEUE_TYPE_BOT_5x5 = 7;
    const QUEUE_TYPE_BOT_5x5_INTRO = 31;
    const QUEUE_TYPE_BOT_5x5_BEGINNER = 32;
    const QUEUE_TYPE_BOT_5x5_INTERMEDIATE = 33;
    const QUEUE_TYPE_NORMAL_3x3 = 8;
    const QUEUE_TYPE_NORMAL_5x5_DRAFT = 14;
    const QUEUE_TYPE_ODIN_5x5_BLIND = 16;
    const QUEUE_TYPE_ODIN_5x5_DRAFT = 17;
    const QUEUE_TYPE_BOT_ODIN_5x5 = 25;
    const QUEUE_TYPE_RANKED_SOLO_5x5 = 4;
    const QUEUE_TYPE_RANKED_PREMADE_3x3 = 9;
    const QUEUE_TYPE_RANKED_PREMADE_5x5 = 6;
    const QUEUE_TYPE_RANKED_TEAM_3x3 = 41;
    const QUEUE_TYPE_RANKED_TEAM_5x5 = 42;
    const QUEUE_TYPE_BOT_TT_3x3 = 52;
    const QUEUE_TYPE_GROUP_FINDER_5x5 = 61;
    const QUEUE_TYPE_ARAM_5x5 = 65;
    const QUEUE_TYPE_ONEFORALL_5x5 = 70;
    const QUEUE_TYPE_FIRSTBLOOD_1x1 = 72;
    const QUEUE_TYPE_FIRSTBLOOD_2x2 = 73;
    const QUEUE_TYPE_SR_6x6 = 75;
    const QUEUE_TYPE_URF_5x5 = 76;
    const QUEUE_TYPE_BOT_URF_5x5 = 83;
    const QUEUE_TYPE_NIGHTMARE_BOT_5x5_RANK1 = 91;
    const QUEUE_TYPE_NIGHTMARE_BOT_5x5_RANK2 = 92;
    const QUEUE_TYPE_NIGHTMARE_BOT_5x5_RANK5 = 93;
    const QUEUE_TYPE_ASCENSION_5x5 = 96;
    const QUEUE_TYPE_HEXAKILL = 98;
    const QUEUE_TYPE_KING_PORO_5x5 = 300; // lol
    const QUEUE_TYPE_COUNTER_PICK = 310;

    /**
     * Returns integer code
     * @return int
     */
    public function getGameQueueConfigId();

    /**
     * Returns string code
     * @return string
     */
    public function getQueueType();

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription();
}