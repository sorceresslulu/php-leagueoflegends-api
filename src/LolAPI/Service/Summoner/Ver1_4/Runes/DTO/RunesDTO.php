<?php
namespace LolAPI\Service\Summoner\Ver1_4\Runes\DTO;

class RunesDTO
{
    /**
     * Rune pages DTOs
     * @var RunePagesDto[]
     */
    private $runePagesDTOs = array();

    /**
     * Summoner.Runes DTO
     * @param array $runePagesDTOs
     */
    public function __construct(array $runePagesDTOs)
    {
        $this->runePagesDTOs = $runePagesDTOs;
    }

    /**
     * Returns rune pages
     * @return RunePagesDto[]
     */
    public function getRunePagesDTOs()
    {
        return $this->runePagesDTOs;
    }
}