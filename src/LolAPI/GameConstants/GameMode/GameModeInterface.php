<?php
namespace LolAPI\GameConstants\GameMode;

interface GameModeInterface
{
    const GAME_MODE_CLASSIC = 'CLASSIC';
    const GAME_MODE_ODIN = 'ODIN';
    const GAME_MODE_ARAM = 'ARAM';
    const GAME_MODE_TUTORIAL = 'TUTORIAL';
    const GAME_MODE_ONEFORALL = 'ONEFORALL';
    const GAME_MODE_ASCENSION = 'ASCENSION';
    const GAME_MODE_FIRSTBLOOD = 'FIRSTBLOOD';
    const GAME_MODE_KINGPORO = 'KINGPORO';

    /**
     * Returns code
     * @return string
     */
    public function getCode();
}