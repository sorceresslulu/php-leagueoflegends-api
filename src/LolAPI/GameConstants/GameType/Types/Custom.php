<?php
namespace LolAPI\GameConstants\GameType\Types;

use LolAPI\GameConstants\GameType\GameTypeInterface;

class Custom implements GameTypeInterface
{
    /**
     * Returns game type code
     * @return string
     */
    public function getCode()
    {
        return self::CUSTOM_GAME;
    }
}