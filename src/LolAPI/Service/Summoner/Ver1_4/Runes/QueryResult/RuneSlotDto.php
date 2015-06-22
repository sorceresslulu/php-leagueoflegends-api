<?php
namespace LolAPI\Service\Summoner\Ver1_4\Runes\QueryResult;

class RuneSlotDto
{
    /**
     * Rune ID associated with the rune slot.
     * @var int
     */
    private $runeId;

    /**
     * Rune slot ID.
     * @var int
     */
    private $runeSlotId;

    function __construct($runeId, $runeSlotId)
    {
        $this->runeId = $runeId;
        $this->runeSlotId = $runeSlotId;
    }

    /**
     * Returns rune ID associated with the rune slot.
     * @return int
     */
    public function getRuneId()
    {
        return $this->runeId;
    }

    /**
     * Returns rune slot ID.
     * @return int
     */
    public function getRuneSlotId()
    {
        return $this->runeSlotId;
    }
}