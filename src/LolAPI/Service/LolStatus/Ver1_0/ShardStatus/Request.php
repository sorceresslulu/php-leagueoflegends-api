<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus;

use LolAPI\Region\RegionInterface;

class Request
{
    /**
     * Region
     * @var \LolAPI\Region\RegionInterface
     */
    private $region;

    public function __construct($region)
    {
        $this->region = $region;
    }

    /**
     * Returns region
     * @return \LolAPI\Region\RegionInterface
     */
    public function getRegion()
    {
        return $this->region;
    }
}