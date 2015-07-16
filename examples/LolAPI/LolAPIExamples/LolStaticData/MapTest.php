<?php
namespace LolAPIExamples\LolStaticData;

use LolAPI\Service\LolStaticData\Ver1_2\Map\DTO\MapDataDTO;
use LolAPI\Service\LolStaticData\Ver1_2\Map\DTOBuilder;
use LolAPI\Service\LolStaticData\Ver1_2\Map\Request;
use LolAPI\Service\LolStaticData\Ver1_2\Map\Service;
use LolAPIExamples\ExampleTest;

class MapTest extends ExampleTest
{
    public function testExample()
    {
        $service = new Service($this->getLolAPIHandler());

        $request = new Request($this->getApiKey(), $this->getRegionalEndpoint());
        $query = $service->createQuery($request);
        $response = $query->execute();

        if($this->isOutputEnabled()) {
            $dtoBuilder = new DTOBuilder();
            $dto = $dtoBuilder->buildDTO($response);

            $this->processResult($dto);
        }
    }

    private function processResult(MapDataDTO $mapDataDTO)
    {
        println(sprintf("Type: %s", $mapDataDTO->getType()));
        println(sprintf("Version: %s", $mapDataDTO->getVersion()));
        println("MapDetails");

        foreach($mapDataDTO->getData() as $mapDetailsDTO) {
            println(sprintf("MapID: %s", $mapDetailsDTO->getMapId()), 1);
            println(sprintf("MapNamepe: %s", $mapDetailsDTO->getMapName()), 1);
            println(sprintf("UnpurchasableItemList: %s", implode(', ', $mapDetailsDTO->getUnpurchasableItemList())), 1);
            println("Image", 1);

            println(sprintf("Full: %s", $mapDetailsDTO->getImage()->getFullFileName()), 2);
            println(sprintf("Sprite: %s", $mapDetailsDTO->getImage()->getSpriteFileName()), 2);
            println(sprintf("Group: %s", $mapDetailsDTO->getImage()->getGroup()), 2);
            println(sprintf("Width: %s", $mapDetailsDTO->getImage()->getWidth()), 2);
            println(sprintf("Height: %s", $mapDetailsDTO->getImage()->getHeight()), 2);
            println(sprintf("X: %s", $mapDetailsDTO->getImage()->getX()), 2);
            println(sprintf("Y: %s", $mapDetailsDTO->getImage()->getY()), 2);
        }
    }
}