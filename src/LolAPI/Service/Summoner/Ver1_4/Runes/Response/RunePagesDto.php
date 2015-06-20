<?php
namespace LolAPI\Service\Summoner\Ver1_4\Runes\Response;

class RunePagesDto
{
    /**
     * Summoner ID
     * @var int
     */
    private $summonerId;

    /**
     * Collection of rune pages associated with the summoner.
     * @var RunePageDto[]
     */
    private $pages;

    function __construct($summonerId, $pages)
    {
        $this->summonerId = $summonerId;
        $this->pages = $pages;
    }

    /**
     * Returns summoner ID
     * @return int
     */
    public function getSummonerId()
    {
        return $this->summonerId;
    }

    /**
     * Returns collection of rune pages associated with the summoner.
     * @return RunePageDto[]
     */
    public function getPages()
    {
        return $this->pages;
    }
}