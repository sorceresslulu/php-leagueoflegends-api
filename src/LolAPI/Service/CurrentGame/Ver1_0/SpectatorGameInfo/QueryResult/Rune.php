<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\QueryResult;

class Rune
{
    /**
     * The ID of the rune
     * @var int
     */
    private $runeId;

    /**
     * The count of this rune used by the participant
     * @var int
     */
    private $count;

    public function __construct($runeId, $count)
    {
        $this->runeId = $runeId;
        $this->count = $count;
    }

    /**
     * Returns rune ID
     * @return int
     */
    public function getRuneId()
    {
        return $this->runeId;
    }

    /**
     * Returns count of this rune used by the participant
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }
}