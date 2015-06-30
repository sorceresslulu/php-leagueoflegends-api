<?php
namespace LolAPI\GameConstants\Season;

use LolAPI\GameConstants\Season\Seasons\Season2014;
use LolAPI\GameConstants\Season\Seasons\Season2015;
use LolAPI\GameConstants\Season\Seasons\Season3;

class SeasonFactory implements SeasonFactoryInterface
{
    /**
     * Returns season by code
     * @param string $seasonCode
     * @return SeasonInterface
     */
    public function getByCode($seasonCode)
    {
        switch(strtoupper($seasonCode)) {
            default:
                throw new \OutOfBoundsException(sprintf("Unknown season with code `%s`", $seasonCode));

            case 'SEASON3': return new Season3();
            case 'SEASON2014': return new Season2014();
            case 'SEASON2015': return new Season2015();
        }
    }
}