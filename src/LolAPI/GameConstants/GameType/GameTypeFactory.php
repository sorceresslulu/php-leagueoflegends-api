<?php
namespace LolAPI\GameConstants\GameType;

use LolAPI\GameConstants\GameType\Types\Custom;
use LolAPI\GameConstants\GameType\Types\Matched;
use LolAPI\GameConstants\GameType\Types\Tutorial;

class GameTypeFactory implements GameTypeFactoryInterface
{
    /**
     * Policy for unknown GameType
     * @var UnknownGameTypePolicyInterface
     */
    private $unknownDataPolicy;

    /**
     * GameType Factory
     * @param UnknownGameTypePolicyInterface $unknownDataPolicy
     */
    public function __construct(UnknownGameTypePolicyInterface $unknownDataPolicy)
    {
        $this->unknownDataPolicy = $unknownDataPolicy;
    }

    /**
     * Returns policy for unknown GameType
     * @return UnknownGameTypePolicyInterface
     */
    public function getUnknownDataPolicy()
    {
        return $this->unknownDataPolicy;
    }


    /**
     * Create and returns GameType from string code
     * @param $stringCode
     * @return GameTypeInterface
     */
    public function createFromStringCode($stringCode)
    {
        $stringCode = strtoupper($stringCode);

        switch($stringCode) {
            default:
                return $this->getUnknownDataPolicy()->getUnknownGameType($stringCode);

            case GameTypeInterface::CUSTOM_GAME: return new Custom();
            case GameTypeInterface::MATCHED_GAME: return new Matched();
            case GameTypeInterface::TUTORIAL_GAME: return new Tutorial();
        }
    }
}