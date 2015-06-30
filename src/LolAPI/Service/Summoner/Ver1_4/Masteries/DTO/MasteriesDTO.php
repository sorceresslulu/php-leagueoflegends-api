<?php
namespace LolAPI\Service\Summoner\Ver1_4\Masteries\DTO;

class MasteriesDTO
{
    /**
     * Summoner DTOs
     * @var MasteryPagesDTO[]
     */
    private $masteryPagesDTOs;

    /**
     * Summoner.Masteries DTO
     * @param MasteryPagesDTO[] $masteryPagesDTOs
     */
    public function __construct(array $masteryPagesDTOs)
    {
        $this->masteryPagesDTOs = $masteryPagesDTOs;
    }

    /**
     * Returns mastery pages DTOs
     * @return \LolAPI\Service\Summoner\Ver1_4\Masteries\DTO\MasteryPagesDTO[]
     */
    public function getMasteryPagesDTOs()
    {
        return $this->masteryPagesDTOs;
    }
}
