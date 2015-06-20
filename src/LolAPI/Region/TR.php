<?php
namespace LolAPI\Region;

use LolAPI\Region;

class TR implements Region
{
    public function getCode()
    {
        return 'tr';
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