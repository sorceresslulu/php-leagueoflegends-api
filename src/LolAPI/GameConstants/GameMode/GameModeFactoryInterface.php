<?php
namespace LolAPI\GameConstants\GameMode;

interface GameModeFactoryInterface
{
    /**
     * Create and returns game mode from string code
     * @param $stringCode
     * @return GameModeInterface
     */
    public function createFromStringCode($stringCode);
}