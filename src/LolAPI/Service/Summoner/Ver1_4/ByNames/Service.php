<?php
namespace LolAPI\Service\Summoner\Ver1_4\ByNames;
class Service extends \LolAPI\AbstractService
{
    public function fetch(Request $request, $returnRawResponse = false) {
        $urlParams = array(
            'api_key' => $request->getApiKey()->toParam()
        );

        $serviceUrl = sprintf(
            'https://%s.api.pvp.net/api/lol/%s/v1.4/summoner/by-name/%s',
            rawurlencode($request->getRegion()->getDomain()),
            rawurlencode($request->getRegion()->getDirectory()),
            rawurlencode(implode(',', $request->getSummonerNames()))
        );

        $response = $this->getAPIHandler()->exec($serviceUrl, $urlParams);

        if($response->isSuccessful()) {
            if($returnRawResponse) {
                return $response;
            }else{
                return $this->createResponse(json_decode($response->getResponse(), true));
            }
        }else{
            throw $this->createSummonerException($response->getHttpCode());
        }
    }

    private function createResponse(array $response) {
        return new Response($response);
    }
}