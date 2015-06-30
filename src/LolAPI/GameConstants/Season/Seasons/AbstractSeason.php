<?php
namespace LolAPI\GameConstants\Season\Seasons;

use LolAPI\GameConstants\Season\SeasonInterface;

abstract class AbstractSeason implements SeasonInterface
{
    /**
     * Returns true if objects are equal
     * @param SeasonInterface $compareTo
     * @return bool
     */
    public function equals(SeasonInterface $compareTo)
    {
        return $this->getCode() === $compareTo->getCode();
    }

    /**
     * Returns season code as param
     * @return string
     */
    public function toParam()
    {
        return strtoupper($this->getCode());
    }
}