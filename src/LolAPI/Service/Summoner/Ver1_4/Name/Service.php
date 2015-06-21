<?php
namespace LolAPI\Service\Summoner\Ver1_4\Name;

use LolAPI\AbstractService;
use LolAPI\Service\Summoner\Ver1_4\Name\Response\SummonerDTO;

class Service extends AbstractService
{
    public function fetch(Request $request)
    {
        $urlParams = array(
            'api_key' => $request->getApiKey()->toParam()
        );

        $serviceUrl = sprintf(
            'https://%s.api.pvp.net/api/lol/%s/v1.4/summoner/%s/name',
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

    private function createResponse(array $response)
    {
        $summonerDTOs = array();

        foreach($response as $summonerId => $summonerName) {
            $summonerDTOs[] = new SummonerDTO(
                (int) $summonerId,
                $summonerName
            );
        }

        return new Response($summonerDTOs);
    }
}