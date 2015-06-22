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
        return 'pbe';
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