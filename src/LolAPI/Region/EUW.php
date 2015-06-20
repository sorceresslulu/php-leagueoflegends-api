<?php
namespace LolAPI\Region;

use LolAPI\Region;

class EUW implements Region
{
    public function getCode()
    {
        return 'euw';
    }

    public function getDirectory()
    {
        return $this->getCode();
    }

    public function getDomain()
    {
        return $this->getCode();
    }
}