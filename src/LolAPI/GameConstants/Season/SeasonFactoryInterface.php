<?php
namespace LolAPI\GameConstants\Season;

interface SeasonFactoryInterface
{
    /**
     * Returns season by code
     * @param string $seasonCode
     * @return SeasonInterface
     */
    public function getByCode($seasonCode);
}