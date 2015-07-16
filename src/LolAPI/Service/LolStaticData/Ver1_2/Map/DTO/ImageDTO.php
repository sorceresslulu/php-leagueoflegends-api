<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Map\DTO;

class ImageDTO
{
    /**
     * Full image filename
     * @var string
     */
    private $fullFileName;

    /**
     * Spite image filename
     * @var string
     */
    private $spriteFileName;

    /**
     * Group
     * @var string
     */
    private $group;

    /**
     * Height
     * @var int
     */
    private $height;

    /**
     * Width
     * @var int
     */
    private $width;

    /**
     * Position (x)
     * @var int
     */
    private $x;

    /**
     * Position (y)
     * @var int
     */
    private $y;

    public function __construct($fullFileName, $spriteFileName, $group, $height, $width, $x, $y)
    {
        $this->fullFileName = $fullFileName;
        $this->spriteFileName = $spriteFileName;
        $this->group = $group;
        $this->height = $height;
        $this->width = $width;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Returns full image filename
     * @return string
     */
    public function getFullFileName()
    {
        return $this->fullFileName;
    }

    /**
     * Returns sprite image filename
     * @return string
     */
    public function getSpriteFileName()
    {
        return $this->spriteFileName;
    }

    /**
     * Returns group
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Returns height
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Returns width
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Returns position (x)
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Returns position (y)
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }
}