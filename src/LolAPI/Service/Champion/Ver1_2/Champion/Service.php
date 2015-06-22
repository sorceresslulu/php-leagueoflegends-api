<?php
namespace LolAPI\Service\Champion\Ver1_2\Champion;

use LolAPI\AbstractService;
use LolAPI\Service\Champion\Ver1_2\Champion\Response\ChampionDTO;

class Service extends AbstractService
{
    public function fetch(Request $request) {
        $urlParams = array(
            'api_key' => $request->getApiKey()->toParam(),
            'id' => $request->getChampionId()
        );

        $serviceUrl = sprintf(
            'https://%s.api.pvp.net/api/lol/%s/v1.2/champion/%d',
            rawurlencode($request->getRegion()->getDomain()),
            rawurlencode($request->getRegion()->getDirectory()),
            rawurlencode($request->getChampionId())
        );

        $response = $this->getAPIHandler()->exec($serviceUrl, $urlParams);

        if($response->isSuccessful()) {
            return $this->createResponse(json_decode($response->getResponse(), true));
        }else{
            throw $this->createChampionException($response->getHttpCode());
        }
    }

    private function createResponse(array $response) {
        return new Response(new ChampionDTO(
            (int) $response['id'],
            (bool) $response['active'],
            (bool) $response['botEnabled'],
            (bool) $response['botMmEnabled'],
            (bool) $response['freeToPlay'],
            (bool) $response['rankedPlayEnabled']
        ));
    }
}