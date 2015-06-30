<?php
namespace LolAPI\Service\Champion\Ver1_2\Champion;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Champion\Ver1_2\Champion\DTO\ChampionDTO;

class DTOBuilder
{
    public function buildDTO(ResponseInterface $response) {
        $parsedResponse = $response->parse();

        return new ChampionDTO(
            (int) $parsedResponse['id'],
            (bool) $parsedResponse['active'],
            (bool) $parsedResponse['botEnabled'],
            (bool) $parsedResponse['botMmEnabled'],
            (bool) $parsedResponse['freeToPlay'],
            (bool) $parsedResponse['rankedPlayEnabled']
        );
    }
}