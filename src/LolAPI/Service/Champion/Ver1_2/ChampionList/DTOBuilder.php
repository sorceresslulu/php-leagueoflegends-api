<?php
namespace LolAPI\Service\Champion\Ver1_2\ChampionList;

use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\Champion\Ver1_2\ChampionList\DTO\ChampionDTO;
use LolAPI\Service\Champion\Ver1_2\ChampionList\DTO\ChampionListDTO;

class DTOBuilder
{
    public function buildDTO(LolAPIResponseInterface $response) {
        $parsedResponse = $response->parse();
        $champions = array();

        foreach($parsedResponse['champions'] as $champion) {
            $champions[] = new ChampionDTO(
                (int) $champion['id'],
                (bool) $champion['active'],
                (bool) $champion['botEnabled'],
                (bool) $champion['botMmEnabled'],
                (bool) $champion['freeToPlay'],
                (bool) $champion['rankedPlayEnabled']
            );
        }

        return new ChampionListDTO($champions);
    }
}