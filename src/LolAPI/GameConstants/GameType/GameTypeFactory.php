<?php
namespace LolAPI\GameConstants\GameType;

use LolAPI\GameConstants\GameType\Types\Custom;
use LolAPI\GameConstants\GameType\Types\Matched;
use LolAPI\GameConstants\GameType\Types\Tutorial;

class GameTypeFactory
{
    /**
     * Create and returns GameType from string code
     * @param $stringCode
     * @param bool $throwExceptionsOnUnknownCode
     * @return GameTypeInterface
     */
    public static function createFromStringCode($stringCode, $throwExceptionsOnUnknownCode = false)
    {
        $stringCode = strtoupper($stringCode);

        switch($stringCode) {
            default:
                if($throwExceptionsOnUnknownCode) {
                    throw new \OutOfBoundsException(sprintf("Unknown game type `%s`", $stringCode));
                }else{
                    return new Types\Unknown($stringCode);
                }

            case GameTypeInterface::CUSTOM_GAME: return new Custom();
            case GameTypeInterface::MATCHED_GAME: return new Matched();
            case GameTypeInterface::TUTORIAL_GAME: return new Tutorial();
        }
    }
}