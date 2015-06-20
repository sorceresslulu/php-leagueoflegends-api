<?php
namespace LolAPI\Region;

use LolAPI\Region;

class PBE implements Region
{
    public function getCode()
    {
        return 'pbe';
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