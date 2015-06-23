<?php
namespace LolAPI\Region;

use LolAPI\Region;

class PBE implements Region
{
    /**
     * {@inheritdoc}
     * @return string
     */
    public function getCode()
    {
        return self::REGION_PBE;
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public function getDomain()
    {
        return strtolower($this->getCode());
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public function getDirectory()
    {
        return strtolower($this->getCode());
    }
}