<?php
namespace LolAPI\GameConstants\GameMode;

interface UnknownDataPolicyInterface
{
    /**
     * Returns unknown GameMode
     * You can implement your own policy for adding some logging functions
     * @param string $stringCode
     * @return GameModeInterface
     */
    public function getUnknownGameMode($stringCode);
}