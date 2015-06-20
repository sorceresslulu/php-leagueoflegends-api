<?php
namespace LolAPI\Region;

use LolAPI\Region;

class EUNE implements Region
{
    public function getCode()
    {
        return 'eune';
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