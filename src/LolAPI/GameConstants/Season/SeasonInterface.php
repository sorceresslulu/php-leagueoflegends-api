<?php
namespace LolAPI\GameConstants\Season;

interface SeasonInterface
{
    /**
     * Returns season code
     * @return string
     */
    public function getCode();

    /**
     * Returns season code as param
     * @return string
     */
    public function toParam();

    /**
     * Returns true if objects are equal
     * @param SeasonInterface $compareTo
     * @return bool
     */
    public function equals(SeasonInterface $compareTo);
}