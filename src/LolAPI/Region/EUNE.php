<?php
namespace LolAPI\Region;

use LolAPI\Region;

class EUNE implements Region
{
    /**
     * {@inheritdoc}
     * @return string
     */
    public function getCode()
    {
        return 'eune';
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