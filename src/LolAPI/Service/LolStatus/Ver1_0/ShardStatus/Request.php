<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus;

use LolAPI\Region;

class Request
{
    /**
     * Region
     * @var Region
     */
    private $region;

    public function __construct($region)
    {
        $this->region = $region;
    }

    /**
     * Returns region
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }
}