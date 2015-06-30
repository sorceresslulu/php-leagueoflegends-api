<?php
namespace LolAPI\Service\Summoner\Ver1_4\Runes\DTO;

use LolAPI\Service\Summoner\Ver1_4\Runes\DTO\RuneSlotDto;

class RunePageDto
{
    /**
     * Rune page ID
     * @var int
     */
    private $id;

    /**
     * Indicates if the page is the current page
     * @var bool
     */
    private $current;

    /**
     * Rune page name
     * @var string
     */
    private $name;

    /**
     * Collection of rune slots associated with the rune page
     * @var RuneSlotDto[]
     */
    private $slots;

    function __construct($id, $current, $name, $slots)
    {
        $this->id = $id;
        $this->current = $current;
        $this->name = $name;
        $this->slots = $slots;
    }

    /**
     * Returns rune page ID
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns true if the page is the current page
     * @return boolean
     */
    public function isCurrent()
    {
        return $this->current;
    }

    /**
     * Returns rune page name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns collection of rune slots associated with the rune page
     * @return RuneSlotDto[]
     */
    public function getSlots()
    {
        return $this->slots;
    }

    /**
     * Returns true if rune page has slots
     * @return bool
     */
    public function hasSlots()
    {
        return count($this->slots) > 0;
    }
}