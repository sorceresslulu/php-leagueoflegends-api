<?php
namespace LolAPI\Service\Summoner\Ver1_4\Masteries\QueryResult;

class MasteryPagesDTO
{
    /**
     * Summoner ID.
     * @var int
     */
    private $summonerId;

    /**
     * Collection of mastery pages associated with the summoner.
     * @var MasteryPageDTO[]
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
     * Returns collection of mastery pages associated with the summoner.
     * @return MasteryPageDTO[]
     */
    public function getPages()
    {
        return $this->pages;
    }
}