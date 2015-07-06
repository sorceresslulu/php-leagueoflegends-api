<?php
namespace LolAPI\Service\Summoner\Ver1_4\Runes;

use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\Summoner\Ver1_4\Runes\DTO\RunesDTO;

class DTOBuilder
{
    /**
     * Builds and returns Summoner.Runes DTO
     * @param LolAPIResponseInterface $response
     * @return RunesDTO
     */
    public function buildDTO(LolAPIResponseInterface $response)
    {
        $parsedResponse = $response->parse();
        $runePagesDTOs = array();

        foreach($parsedResponse as $summonerId => $arrRunePages) {
            $pages = array();

            foreach($arrRunePages['pages'] as $page) {
                $slots = array();

                if(isset($page['slots'])) {
                    foreach($page['slots'] as $slot) {
                        $slots[] = new DTO\RuneSlotDto(
                            (int) $slot['runeId'],
                            (int) $slot['runeSlotId']
                        );
                    }
                }

                $pages[] = new DTO\RunePageDto(
                    (int) $page['id'],
                    (bool) $page['current'],
                    $page['name'],
                    $slots
                );
            }

            $runePagesDTOs[] = new DTO\RunePagesDto((int) $summonerId, $pages);
        }

        return new RunesDTO($runePagesDTOs);
    }
}