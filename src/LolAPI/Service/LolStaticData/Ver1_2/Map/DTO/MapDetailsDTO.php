<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Map\DTO;

class MapDetailsDTO
{
    /**
     * ImageDTO
     * @var ImageDTO
     */
    private $image;

    /**
     * Map ID
     * @var int
     */
    private $mapId;

    /**
     * Map name
     * @var string
     */
    private $mapName;

    /**
     * List of unpurchasable items (id)
     * @var int[]
     */
    private $unpurchasableItemList;

    public function __construct(ImageDTO $image, $mapId, $mapName, array $unpurchasableItemList)
    {
        $this->image = $image;
        $this->mapId = $mapId;
        $this->mapName = $mapName;
        $this->unpurchasableItemList = $unpurchasableItemList;
    }

    /**
     * Returns ImageDTO
     * @return ImageDTO
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Returns map ID
     * @return int
     */
    public function getMapId()
    {
        return $this->mapId;
    }

    /**
     * Returns map name
     * @return string
     */
    public function getMapName()
    {
        return $this->mapName;
    }

    /**
     * Returns list of unpurchasable items (id)
     * @return \int[]
     */
    public function getUnpurchasableItemList()
    {
        return $this->unpurchasableItemList;
    }
}