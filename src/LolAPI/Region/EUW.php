<?php
namespace LolAPI\Region;

use LolAPI\Region;

class EUW implements Region
{
    /**
     * {@inheritdoc}
     * @return string
     */
    public function getCode()
    {
        return 'euw';
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