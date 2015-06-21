<?php
namespace LolAPI\Service\Summoner\Ver1_4\ByIds;

class Service extends \LolAPI\AbstractService
{
    public function fetch(Request $request) {
        $urlParams = array(
            'api_key' => $request->getApiKey()->toParam()
        );

        $serviceUrl = sprintf(
            'https://%s.api.pvp.net/api/lol/%s/v1.4/summoner/%s',
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
        return new Response($response);
    }
}