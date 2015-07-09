<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Realm;

use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\LolStaticData\Ver1_2\Realm\DTO\RealmDTO;

class DTOBuilder
{
    /**
     * LolStaticData.Realm DTO builder
     * @param LolAPIResponseInterface $response
     * @return RealmDTO
     */
    public function buildDTO(LolAPIResponseInterface $response)
    {
        $parsedResponse = $response->parse();

        return new RealmDTO(
            $parsedResponse['cdn'],
            $parsedResponse['css'],
            $parsedResponse['dd'],
            $parsedResponse['l'],
            $parsedResponse['lg'],
            (int) $parsedResponse['profileiconmax'],
            $parsedResponse['n'],
            isset($parsedResponse['store']) ? $parsedResponse['store'] : null,
            $parsedResponse['v']
        );
    }
}