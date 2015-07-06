<?php
namespace LolAPI\Service\Summoner\Ver1_4\Masteries;

use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\Summoner\Ver1_4\Masteries\DTO\MasteriesDTO;
use LolAPI\Service\Summoner\Ver1_4\Masteries\DTO\MasteryDTO;
use LolAPI\Service\Summoner\Ver1_4\Masteries\DTO\MasteryPageDTO;
use LolAPI\Service\Summoner\Ver1_4\Masteries\DTO\MasteryPagesDTO;

class DTOBuilder
{
    public function buildDTO(LolAPIResponseInterface $response)
    {
        $parsedResponse = $response->parse();
        $summonerDTOs = array();

        foreach($parsedResponse as $summonerId => $arrMasteryPages) {
            $pages = array();

            foreach($arrMasteryPages['pages'] as $arrMasteryPage) {
                $masteries = array();

                if(isset($arrMasteryPage['masteries'])) { // Riot pls mark optional fields in your API documentation
                    foreach($arrMasteryPage['masteries'] as $arrMastery) {
                        $masteries[] = new MasteryDTO(
                            (int) $arrMastery['id'],
                            (int) $arrMastery['rank']
                        );
                    }

                    $pages[] = new MasteryPageDTO(
                        (int) $arrMasteryPage['id'],
                        (bool) $arrMasteryPage['current'],
                        $masteries,
                        $arrMasteryPage['name']
                    );
                }
            }

            $summonerDTOs[] = new MasteryPagesDTO(
                (int) $summonerId,
                $pages
            );
        }

        return new MasteriesDTO($summonerDTOs);
    }
}