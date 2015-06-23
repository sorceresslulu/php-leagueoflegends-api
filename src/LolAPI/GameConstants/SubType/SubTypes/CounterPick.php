<?php
namespace LolAPI\GameConstants\SubType\SubTypes;

use LolAPI\GameConstants\SubType\SubTypeInterface;

class CounterPick implements SubTypeInterface
{
    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return self::SUB_TYPE_COUNTER_PICK;
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Nemesis games";
    }
}