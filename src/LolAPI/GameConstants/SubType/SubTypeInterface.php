<?php
namespace LolAPI\GameConstants\SubType;

interface SubTypeInterface
{
    const SUB_TYPE_NONE = "NONE";
    const SUB_TYPE_NORMAL = "NORMAL";
    const SUB_TYPE_NORMAL_3x3 = "NORMAL_3x3";
    const SUB_TYPE_ODIN_UNRANKED = "ODIN_UNRANKED";
    const SUB_TYPE_ARAM_UNRANKED_5x5 = "ARAM_UNRANKED_5x5";
    const SUB_TYPE_BOT = "BOT";
    const SUB_TYPE_BOT_3x3 = "BOT_3x3";
    const SUB_TYPE_RANKED_SOLO_5x5 = "RANKED_SOLO_5x5";
    const SUB_TYPE_RANKED_TEAM_3x3 = "RANKED_TEAM_3x3";
    const SUB_TYPE_RANKED_TEAM_5x5 = "RANKED_TEAM_5x5";
    const SUB_TYPE_ONEFORALL_5x5 = "ONEFORALL_5x5";
    const SUB_TYPE_FIRSTBLOOD_1x1 = "FIRSTBLOOD_1x1";
    const SUB_TYPE_FIRSTBLOOD_2x2 = "FIRSTBLOOD_2x2";
    const SUB_TYPE_SR_6x6 = "SR_6x6";
    const SUB_TYPE_CAP_5x5 = "CAP_5x5";
    const SUB_TYPE_URF = "URF";
    const SUB_TYPE_URF_BOT = "URF_BOT";
    const SUB_TYPE_NIGHTMARE_BOT = "NIGHTMARE_BOT";
    const SUB_TYPE_ASCENSION = "ASCENSION";
    const SUB_TYPE_HEXAKILL = "HEXAKILL";
    const SUB_TYPE_KING_PORO = "KING_PORO";
    const SUB_TYPE_COUNTER_PICK = "COUNTER_PICK";

    /**
     * Returns code
     * @return string
     */
    public function getCode();

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription();
}