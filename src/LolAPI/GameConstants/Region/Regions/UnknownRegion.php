<?php
namespace LolAPI\Region\Regions;

use LolAPI\Region\RegionInterface;

class UnknownRegion implements RegionInterface
{
    /**
     * Region code
     * @var string
     */
    private $code;

    /**
     * Special case - unknown code
     * @param string $code
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public function getDirectory()
    {
        return strtolower($this->getCode());
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public function getDomain()
    {
        return strtolower($this->getCode());
    }
}