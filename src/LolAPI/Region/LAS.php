<?php
namespace LolAPI\Region;

use LolAPI\Region;

class LAS implements Region
{
    public function getCode()
    {
        return 'las';
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