<?php
namespace LolAPI\Region;

use LolAPI\Region;

class LAN implements Region
{
    public function getCode()
    {
        return 'lan';
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