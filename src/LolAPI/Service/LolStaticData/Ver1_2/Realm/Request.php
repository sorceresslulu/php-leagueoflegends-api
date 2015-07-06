<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Realm;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;
use LolAPI\Service\LolStaticData\Component\DataDragonRequest;

class Request extends DataDragonRequest
{
    /**
     * LolStaticData.Realm request
     * @param APIKey $APIKey
     * @param RegionalEndpointInterface $regionalEndpoint
     */
    public function __construct(APIKey $APIKey, RegionalEndpointInterface $regionalEndpoint)
    {
        $this->apiKey = $APIKey;
        $this->regionalEndpoint = $regionalEndpoint;
    }
}
