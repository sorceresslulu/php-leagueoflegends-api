<?php
namespace LolAPI\GameConstants\PlayerStatSummaryType;

interface PlayerStatSummaryTypeInterface
{
    const TYPE_UNRANKED = "Unranked";
    const TYPE_UNRANKED_3X3 = "Unranked3x3";
    const TYPE_ODIN_UNRANKED = "OdinUnranked";
    const TYPE_ARAM_UNRANKED_5X5 = "AramUnranked5x5";
    const TYPE_COOP_VS_AI = "CoopVsAI";
    const TYPE_COOP_VS_AI_3X3 = "CoopVsAI3x3";
    const TYPE_RANKED_SOLO_5X5   = "RankedSolo5x5";
    const TYPE_RANKED_TEAM_3X3 = "RankedTeam3x3";
    const TYPE_RANKED_TEAM_5X5 = "RankedTeam5x5";
    const TYPE_ONE_FOR_ALL_5X5 = "OneForAll5x5";
    const TYPE_FIRST_BLOOD_1X1 = "FirstBlood1x1";
    const TYPE_FIRST_BLOOD_2X2 = "FirstBlood2x2";
    const TYPE_SUMMONERS_RIFT_6X6 = "SummonersRift6x6";
    const TYPE_CAP_5X5 = "CAP5x5";
    const TYPE_URF = "URF";
    const TYPE_URF_BOTS = "URFBots";
    const TYPE_NIGHTMARE_BOT = "NightmareBot";
    const TYPE_ASCENSION = "Ascension";
    const TYPE_HEXAKILL = "Hexakill";
    const TYPE_KING_PORO = "KingPoro";
    const TYPE_COUNTER_PICK = "CounterPick";

    /**
     * Returns string code
     * @return string
     */
    public function getStringCode();

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription();
}