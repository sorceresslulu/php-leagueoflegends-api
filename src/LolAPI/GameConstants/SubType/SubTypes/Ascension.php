<?php
namespace LolAPI\GameConstants\SubType\SubTypes;

use LolAPI\GameConstants\SubType\SubTypeInterface;

class Ascension implements SubTypeInterface
{
    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return self::SUB_TYPE_ASCENSION;
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Ascension games";
    }
}