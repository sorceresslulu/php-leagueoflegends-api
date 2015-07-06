<?php
namespace LolAPI\Service\Stats\Ver1_3\BySummoner;

use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\Stats\Ver1_3\BySummoner\DTO\AggregatedStatsDto;
use LolAPI\Service\Stats\Ver1_3\BySummoner\DTO\ChampionStatsDto;
use LolAPI\Service\Stats\Ver1_3\BySummoner\DTO\RankedStatsDto;

class DTOBuilder
{
    /**
     * Builds and returns Stats.BySummoner DTO
     * @param LolAPIResponseInterface $response
     * @return \LolAPI\Service\Stats\Ver1_3\BySummoner\DTO\RankedStatsDto
     */
    public function buildDTO(LolAPIResponseInterface $response)
    {
        $parsedResponse = $response->parse();
        $champions = array();

        foreach($parsedResponse['champions'] as $arrChampion) {
            $champions[] = new ChampionStatsDto(
                (int) $arrChampion['id'],
                new AggregatedStatsDto($arrChampion['stats'])
            );
        }

        $rankedStatsDTO = new RankedStatsDto(
            (int) $parsedResponse['summonerId'],
            (int) $parsedResponse['modifyDate'],
            $champions
        );

        return $rankedStatsDTO;
    }
}