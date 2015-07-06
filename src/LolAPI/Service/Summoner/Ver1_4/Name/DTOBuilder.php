<?php
namespace LolAPI\Service\Summoner\Ver1_4\Name;

use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\Summoner\Ver1_4\Name\DTO\NameDTO;
use LolAPI\Service\Summoner\Ver1_4\Name\DTO\SummonerDTO;

class DTOBuilder
{
    /**
     * Builds and returns Summoner.Name DTO
     * @param LolAPIResponseInterface $response
     * @return \LolAPI\Service\Summoner\Ver1_4\Name\DTO\NameDTO
     */
    public function buildDTO(LolAPIResponseInterface $response)
    {
        $parsedResponse = $response->parse();
        $summonerDTOs = array();

        foreach($parsedResponse as $summonerId => $summonerName) {
            $summonerDTOs[] = new SummonerDTO(
                (int) $summonerId,
                $summonerName
            );
        }

        return new NameDTO($summonerDTOs);
    }
}