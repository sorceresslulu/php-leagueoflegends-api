<?php
namespace LolAPI\Region;

use LolAPI\Region;

class RU implements Region
{
    /**
     * {@inheritdoc}
     * @return string
     */
    public function getCode()
    {
        return self::REGION_RU;
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