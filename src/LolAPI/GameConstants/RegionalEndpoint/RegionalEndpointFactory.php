<?php
namespace LolAPI\GameConstants\RegionalEndpoint;

use LolAPI\GameConstants\RegionalEndpoint\Endpoints\BR1RegionalEndpoint;
use LolAPI\GameConstants\RegionalEndpoint\Endpoints\EUN1RegionalEndpoint;
use LolAPI\GameConstants\RegionalEndpoint\Endpoints\EUW1RegionalEndpoint;
use LolAPI\GameConstants\RegionalEndpoint\Endpoints\GlobalRegionalEndpoint;
use LolAPI\GameConstants\RegionalEndpoint\Endpoints\KRRegionalEndpoint;
use LolAPI\GameConstants\RegionalEndpoint\Endpoints\LA1RegionalEndpoint;
use LolAPI\GameConstants\RegionalEndpoint\Endpoints\LA2RegionalEndpoint;
use LolAPI\GameConstants\RegionalEndpoint\Endpoints\NA1RegionalEndpoint;
use LolAPI\GameConstants\RegionalEndpoint\Endpoints\OC1RegionalEndpoint;
use LolAPI\GameConstants\RegionalEndpoint\Endpoints\PBE1RegionalEndpoint;
use LolAPI\GameConstants\RegionalEndpoint\Endpoints\RURegionalEndpoint;
use LolAPI\GameConstants\RegionalEndpoint\Endpoints\TR1RegionalEndpoint;

class RegionalEndpointFactory implements RegionalEndpointFactoryInterface
{
    /**
     * Create and returns regional endpoint by platform Id
     * @param string $sPlatformId
     * @return RegionalEndpointInterface
     */
    public function createFromPlatformId($sPlatformId)
    {
        switch(strtoupper($sPlatformId)) {
            default:
                throw new \OutOfBoundsException(sprintf("Unknown regional endpoint with platformId `%s`", $sPlatformId));

            case 'BR1': return new BR1RegionalEndpoint();
            case 'EUN1': return new EUN1RegionalEndpoint();
            case 'EUW1': return new EUW1RegionalEndpoint();
            case 'KR': return new KRRegionalEndpoint();
            case 'LA1': return new LA1RegionalEndpoint();
            case 'LA2': return new LA2RegionalEndpoint();
            case 'NA1': return new NA1RegionalEndpoint();
            case 'OC1': return new OC1RegionalEndpoint();
            case 'TR1': return new TR1RegionalEndpoint();
            case 'RU': return new RURegionalEndpoint();
            case 'PBE1': return new PBE1RegionalEndpoint();
            case 'GLOBAL': return new GlobalRegionalEndpoint();
        }
    }
}