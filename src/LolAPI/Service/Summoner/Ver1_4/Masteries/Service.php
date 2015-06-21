<?php
namespace LolAPI\Service\Summoner\Ver1_4\Masteries;

use LolAPI\Service\Summoner\Ver1_4\Masteries\Response\MasteryDTO;
use LolAPI\Service\Summoner\Ver1_4\Masteries\Response\MasteryPageDTO;
use LolAPI\Service\Summoner\Ver1_4\Masteries\Response\MasteryPagesDTO;

class Service extends \LolAPI\AbstractService
{
    public function fetch(Request $request) {
        $urlParams = array(
            'api_key' => $request->getApiKey()->toParam()
        );

        $serviceUrl = sprintf(
            'https://%s.api.pvp.net/api/lol/%s/v1.4/summoner/%s/masteries',
            rawurlencode($request->getRegion()->getDomain()),
            rawurlencode($request->getRegion()->getDirectory()),
            rawurlencode(implode(',', $request->getSummonerIds()))
        );

        $response = $this->getAPIHandler()->exec($serviceUrl, $urlParams);

        if($response->isSuccessful()) {
            return $this->createResponse(json_decode($response->getResponse(), true));
        }else{
            throw $this->createSummonerException($response->getHttpCode());
        }
    }

    private function createResponse(array $response) {
        $summonerDTOs = array();
        foreach($response as $summonerId => $arrMasteryPages) {
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

        return new Response($summonerDTOs);
    }
}