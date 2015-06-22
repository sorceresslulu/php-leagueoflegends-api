<?php
namespace LolAPI\Region;

use LolAPI\Region;

class OCE implements Region
{
    /**
     * {@inheritdoc}
     * @return string
     */
    public function getCode()
    {
        return 'oce';
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public function getDirectory()
    {
        return $this->getCode();
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public function getDomain()
    {
        return $this->getCode();
    }
}