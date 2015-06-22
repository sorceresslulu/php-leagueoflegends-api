<?php
namespace LolAPI\Region;

use LolAPI\Region;

class BR implements Region
{
    /**
     * {@inheritdoc}
     * @return string
     */
    public function getCode()
    {
        return 'br';
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public function getDomain()
    {
        return $this->getCode();
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public function getDirectory()
    {
        return $this->getCode();
    }
}