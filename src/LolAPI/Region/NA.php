<?php
namespace LolAPI\Region;

use LolAPI\Region;

class NA implements Region
{
    public function getCode()
    {
        return 'na';
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