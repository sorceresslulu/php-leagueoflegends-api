<?php
namespace LolAPI\GameConstants\GameType;

interface GameTypeInterface
{
    const CUSTOM_GAME = 'CUSTOM_GAME';
    const MATCHED_GAME = 'MATCHED_GAME';
    const TUTORIAL_GAME = 'TUTORIAL_GAME';

    /**
     * Returns game type code
     * @return string
     */
    public function getCode();
}