<?php
namespace LolAPI\Service\FeaturedGame\Ver1_0\DTO;

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