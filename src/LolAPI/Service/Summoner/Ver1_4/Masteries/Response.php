<?php
namespace LolAPI\Service\Summoner\Ver1_4\Masteries;

class Response
{
    /**
     * Summoner DTOs
     * @var \LolAPI\Service\Summoner\Ver1_4\Masteries\Response\MasteryPagesDTO[]
     */
    private $masteryPagesDTOs;

    function __construct($masteryPagesDTOs)
    {
        $this->masteryPagesDTOs = $masteryPagesDTOs;
    }

    /**
     * Returns summoner DTO's
     * @return \LolAPI\Service\Summoner\Ver1_4\Masteries\Response\MasteryPagesDTO[]
     */
    public function getMasteryPagesDTOs()
    {
        return $this->masteryPagesDTOs;
    }
}

