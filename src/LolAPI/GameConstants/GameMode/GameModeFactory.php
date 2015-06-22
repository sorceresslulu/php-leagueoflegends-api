<?php
namespace LolAPI\GameConstants\GameMode;

use LolAPI\GameConstants\GameMode\Modes\ARAM;
use LolAPI\GameConstants\GameMode\Modes\Ascension;
use LolAPI\GameConstants\GameMode\Modes\Classic;
use LolAPI\GameConstants\GameMode\Modes\Firstblood;
use LolAPI\GameConstants\GameMode\Modes\KingPoro;
use LolAPI\GameConstants\GameMode\Modes\ODIN;
use LolAPI\GameConstants\GameMode\Modes\OneForAll;
use LolAPI\GameConstants\GameMode\Modes\Tutorial;
use LolAPI\GameConstants\GameMode\Modes\Unknown;

class GameModeFactory
{
    /**
     * Create and returns game mode from string code
     * @param $stringCode
     * @param bool $throwExceptionsOnUnknownCode
     * @return GameModeInterface
     */
    public static function createFromStringCode($stringCode, $throwExceptionsOnUnknownCode = false) {
        switch($stringCode) {
            default:
                if($throwExceptionsOnUnknownCode) {
                    throw new \OutOfBoundsException(sprintf("Unknown game mode `%s`", $stringCode));
                }else{
                    return new Unknown($stringCode);
                }

            case GameModeInterface::GAME_MODE_CLASSIC: return new Classic();
            case GameModeInterface::GAME_MODE_ARAM: return new ARAM();
            case GameModeInterface::GAME_MODE_TUTORIAL: return new Tutorial();

            case GameModeInterface::GAME_MODE_KINGPORO: return new KingPoro();
            case GameModeInterface::GAME_MODE_FIRSTBLOOD: return new Firstblood();
            case GameModeInterface::GAME_MODE_ONEFORALL: return new OneForAll();
            case GameModeInterface::GAME_MODE_ODIN: return new ODIN();
            case GameModeInterface::GAME_MODE_ASCENSION: return new Ascension();
        }
    }
}