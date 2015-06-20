<?php
namespace LolAPI\Service\Summoner\Ver1_4\Runes;

class Response
{
    /**
     * Rune pages DTOs
     * @var \LolAPI\Service\Summoner\Ver1_4\Runes\Response\RunePagesDto[]
     */
    private $runePagesDTOs = array();

    function __construct($runePagesDTOs)
    {
        $this->runePagesDTOs = $runePagesDTOs;
    }

    /**
     * Returns collection of RunePagesDTO
     * @return \LolAPI\Service\Summoner\Ver1_4\Runes\Response\RunePagesDto[]
     */
    public function getRunePagesDTOs()
    {
        return $this->runePagesDTOs;
    }
}

