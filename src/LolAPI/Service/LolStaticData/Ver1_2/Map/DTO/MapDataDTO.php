<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Map\DTO;

class MapDataDTO
{
    /**
     * Type
     * @var string
     */
    private $type;

    /**
     * Version
     * @var string
     */
    private $version;

    /**
     * Map details DTOs
     * @var MapDetailsDTO[]
     */
    private $data;

    public function __construct($type, $version, array $data)
    {
        $this->type = $type;
        $this->version = $version;
        $this->data = $data;
    }

    /**
     * Returns type
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns version
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Returns map details DTOs
     * @return MapDetailsDTO[]
     */
    public function getData()
    {
        return $this->data;
    }
}