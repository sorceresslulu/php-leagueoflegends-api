<?php
namespace LolAPI\Region;

use LolAPI\Region;

class OCE implements Region
{
    public function getCode()
    {
        return 'oce';
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