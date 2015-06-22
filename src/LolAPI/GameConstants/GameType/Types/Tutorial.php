<?php
namespace LolAPI\GameConstants\GameType\Types;

use LolAPI\GameConstants\GameType\GameTypeInterface;

class Tutorial implements GameTypeInterface
{
    /**
     * Returns game type code
     * @return string
     */
    public function getCode()
    {
        return self::TUTORIAL_GAME;
    }
}