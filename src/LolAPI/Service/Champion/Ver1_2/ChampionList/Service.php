<?php
namespace LolAPI\Service\Champion\Ver1_2\ChampionList;

use LolAPI\AbstractService;
use LolAPI\Service\Champion\Ver1_2\ChampionList\Response\ChampionDTO;

class Service extends AbstractService
{
    public function fetch(Request $request) {
        if($request->fetchNotFreeToPlayChampionsOnly()) {
            $urlParams = array(
                'freeToPlay' => "false"
            );
        }else if($request->fetchFreeToPlayChampionsOnly()) {
            $urlParams = array(
                'freeToPlay' => "true"
            );
        }else{
            $urlParams = array();
        }

        $urlParams['api_key'] = $request->getApiKey()->toParam();

        $serviceUrl = sprintf(
            'https://%s.api.pvp.net/api/lol/%s/v1.2/champion',
            rawurlencode($request->getRegion()->getDomain()),
            rawurlencode($request->getRegion()->getDirectory())
        );

        $response = $this->getAPIHandler()->exec($serviceUrl, $urlParams);

        if($response->isSuccessful()) {
            return $this->createResponse(json_decode($response->getResponse(), true));
        }else{
            throw $this->createChampionException($response->getHttpCode());
        }
    }

    private function createResponse(array $response) {
        $champions = array();

        foreach($response['champions'] as $champion) {
            $champions[] = new ChampionDTO(
                (int) $champion['id'],
                (bool) $champion['active'],
                (bool) $champion['botEnabled'],
                (bool) $champion['botMmEnabled'],
                (bool) $champion['freeToPlay'],
                (bool) $champion['rankedPlayEnabled']
            );
        }

        return new Response($champions);
    }
}