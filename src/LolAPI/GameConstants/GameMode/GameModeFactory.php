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

class GameModeFactory
{
    /**
     * Policy for unknown GameMode
     * @var UnknownDataPolicyInterface
     */
    private $unknownDataPolicy;

    /**
     * GameMode Factory
     * @param UnknownDataPolicyInterface $unknownDataPolicy
     */
    public function __construct(UnknownDataPolicyInterface $unknownDataPolicy)
    {
        $this->unknownDataPolicy = $unknownDataPolicy;
    }

    /**
     * Returns policy for unknown GameMode
     * @return UnknownDataPolicyInterface
     */
    protected function getUnknownDataPolicy()
    {
        return $this->unknownDataPolicy;
    }

    /**
     * Create and returns game mode from string code
     * @param $stringCode
     * @return GameModeInterface
     */
    public function createFromStringCode($stringCode) {
        switch($stringCode) {
            default:
                return $this->getUnknownDataPolicy()->getUnknownGameMode($stringCode);

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