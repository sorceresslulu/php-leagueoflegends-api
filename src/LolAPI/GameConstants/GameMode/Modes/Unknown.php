<?php
namespace LolAPI\GameConstants\GameMode\Modes;

use LolAPI\GameConstants\GameMode\GameModeInterface;

class Unknown implements GameModeInterface
{
    /**
     * Code
     * @var string
     */
    private $code;

    /**
     * Special case for unknown codes
     * @param  string$code
     */
    public function __construct($code) {
        $this->code = $code;
    }

    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}