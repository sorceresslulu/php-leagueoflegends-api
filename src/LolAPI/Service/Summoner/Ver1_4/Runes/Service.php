<?php
namespace LolAPI\Service\Summoner\Ver1_4\Runes;

use LolAPI\AbstractService;

class Service extends AbstractService
{
    public function fetch(Request $request) {
        $urlParams = array(
            'api_key' => $request->getApiKey()->toParam()
        );

        $serviceUrl = sprintf(
            'https://%s.api.pvp.net/api/lol/%s/v1.4/summoner/%s/runes',
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
        $runePagesDTOs = array();

        foreach($response as $summonerId => $arrRunePages) {
            $pages = array();

            foreach($arrRunePages['pages'] as $page) {
                $slots = array();

                if(isset($page['slots'])) {
                    foreach($page['slots'] as $slot) {
                        $slots[] = new Response\RuneSlotDto(
                            (int) $slot['runeId'],
                            (int) $slot['runeSlotId']
                        );
                    }
                }

                $pages[] = new Response\RunePageDto(
                    (int) $page['id'],
                    (bool) $page['current'],
                    $page['name'],
                    $slots
                );
            }

            $runePagesDTOs[] = new Response\RunePagesDto((int) $summonerId, $pages);
        }

        return new Response($runePagesDTOs);
    }
}