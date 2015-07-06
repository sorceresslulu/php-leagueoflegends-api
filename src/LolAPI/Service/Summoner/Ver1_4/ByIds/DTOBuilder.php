<?php
namespace LolAPI\Service\Summoner\Ver1_4\ByIds;

use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\Summoner\Ver1_4\ByIds\DTO\ByIdsDTO;

class DTOBuilder
{
    /**
     * Builds and returns Summoner.ByIds DTO
     * @param LolAPIResponseInterface $response
     * @return ByIdsDTO
     */
    public function buildDTO(LolAPIResponseInterface $response)
    {
        $parsedResponse = $response->parse();
        $summonerDTOs = array();

        foreach($parsedResponse as $summonerStandardizedName => $summonerDTO) {
            $summonerDTOs[$summonerStandardizedName] = new DTO\SummonerDTO(
                (int) $summonerDTO['id'],
                $summonerDTO['name'],
                (int) $summonerDTO['profileIconId'],
                (int) $summonerDTO['revisionDate'],
                (int) $summonerDTO['summonerLevel']
            );
        }

        return new ByIdsDTO($summonerDTOs);
    }
}