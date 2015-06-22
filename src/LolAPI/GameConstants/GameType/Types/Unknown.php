<?php
namespace LolAPI\GameConstants\GameType\Types;

use LolAPI\GameConstants\GameType\GameTypeInterface;

class Unknown implements GameTypeInterface
{
    /**
     * Code
     * @var string
     */
    private $code;

    /**
     * Special case - unknown game type
     * @param $code
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Returns game type code
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}