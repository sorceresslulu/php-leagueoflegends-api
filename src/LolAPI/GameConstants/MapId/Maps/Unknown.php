<?php
namespace LolAPI\GameConstants\MapId\Maps;

use LolAPI\GameConstants\MapId\MapIdInterface;

class Unknown implements MapIdInterface
{
    /**
     * Code
     * @var int
     */
    private $code;

    /**
     * Special case - unknown map
     * @param int $code
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Returns ID
     * @return int
     */
    public function getId()
    {
        return $this->code;
    }

    /**
     * Returns name (from API documentation)
     * @return string
     */
    public function getName()
    {
        return "Unknown";
    }

    /**
     * Returns notes (from API documentation)
     * @return string
     */
    public function getNotes()
    {
        return "Unknown map";
    }
}