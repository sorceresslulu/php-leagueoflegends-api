<?php
namespace LolAPI\Region;

use LolAPI\Region;

class BR implements Region
{
    public function getCode()
    {
        return 'br';
    }

    public function getDomain()
    {
        return $this->getCode();
    }

    public function getDirectory()
    {
        return $this->getCode();
    }
}