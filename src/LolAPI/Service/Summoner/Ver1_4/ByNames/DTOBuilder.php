<?php
namespace LolAPI\Service\Summoner\Ver1_4\ByNames;

use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\Summoner\Ver1_4\ByNames\DTO\ByNamesDTO;

class DTOBuilder
{
    /**
     * Builds and returns Summoner.ByIds DTO
     * @param LolAPIResponseInterface $response
     * @return \LolAPI\Service\Summoner\Ver1_4\ByNames\DTO\ByNamesDTO
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

        return new ByNamesDTO($summonerDTOs);
    }
}