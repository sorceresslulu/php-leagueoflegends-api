<?php
namespace LolAPI\GameConstants\GameMode\Modes;

use LolAPI\GameConstants\GameMode\GameModeInterface;

class ODIN implements GameModeInterface
{
    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return self::GAME_MODE_ODIN;
    }
}