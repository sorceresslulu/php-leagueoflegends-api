<?php
namespace LolAPI\Region;

use LolAPI\Region;

class KR implements Region
{
    public function getCode()
    {
        return 'kr';
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