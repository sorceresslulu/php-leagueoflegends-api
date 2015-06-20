<?php
namespace LolAPI\Region;

use LolAPI\Region;

class RU implements Region
{
    public function getCode()
    {
        return 'ru';
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