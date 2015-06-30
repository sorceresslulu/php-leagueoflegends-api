<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\DTO;

class Observer
{
    /**
     * Key used to decrypt the spectator grid game data for playback
     * @var string
     */
    private $encryptionKey;

    function __construct($encryptionKey)
    {
        $this->encryptionKey = $encryptionKey;
    }

    /**
     * Returns key used to decrypt the spectator grid game data for playback
     * @return string
     */
    public function getEncryptionKey()
    {
        return $this->encryptionKey;
    }
}