<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Map;

use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\LolStaticData\Ver1_2\Map\DTO\ImageDTO;
use LolAPI\Service\LolStaticData\Ver1_2\Map\DTO\MapDataDTO;
use LolAPI\Service\LolStaticData\Ver1_2\Map\DTO\MapDetailsDTO;

class DTOBuilder
{
    /**
     * Builds and returns MapDataDto
     * @param LolAPIResponseInterface $response
     * @return MapDataDTO
     */
    public function buildDTO(LolAPIResponseInterface $response)
    {
        $parsedResponse = $response->parse();
        $mapDetailsDTO = array();

        foreach($parsedResponse['data'] as $mapDetails) {
            $mapDetailsDTO[] = $this->buildMapDetailsDTO($mapDetails);
        }

        return new MapDataDTO($parsedResponse['type'], $parsedResponse['version'], $mapDetailsDTO);
    }

    /**
     * Builds and returns  MapDetailsDTO
     * @param array $mapDetails
     * @return MapDetailsDTO
     */
    protected function buildMapDetailsDTO(array $mapDetails)
    {
        return new MapDetailsDTO(
            $this->buildImageDTO($mapDetails['image']),
            (int) $mapDetails['mapId'],
            $mapDetails['mapName'],
            $mapDetails['unpurchasableItemList']
        );
    }

    /**
     * Builds and returns ImageDTO
     * @param array $image
     * @return ImageDTO
     */
    protected function buildImageDTO(array $image)
    {
        return new ImageDTO(
            $image['full'],
            $image['sprite'],
            $image['group'],
            (int) $image['h'],
            (int) $image['w'],
            (int) $image['x'],
            (int) $image['y']
        );
    }
}