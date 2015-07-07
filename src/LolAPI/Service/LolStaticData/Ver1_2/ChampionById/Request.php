<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\ChampionById;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;
use LolAPI\Service\LolStaticData\Component\DataDragonRequest;

class Request extends DataDragonRequest
{
    /**
     * Tags to return additional data.
     * Only id, key, name, and title are returned by default if this parameter isn't specified.
     * To return all additional data, use the tag 'all'.
     *
     * Available options: all allytips altimages blurb enemytips image info lore partype passive recommended
     * skins spells stats tags
     *
     * @var string[]|null
     */
    private $champData;

    /**
     * Champion ID
     * @var int
     */
    protected $championId;

    /**
     * LolStaticData.ChampionById request
     * @param APIKey $apiKey
     * @param RegionalEndpointInterface $regionalEndpoint
     * @param int $championId
     */
    public function __construct(APIKey $apiKey, RegionalEndpointInterface $regionalEndpoint, $championId)
    {
        $this->apiKey = $apiKey;
        $this->regionalEndpoint = $regionalEndpoint;
        $this->championId = $championId;
    }

    /**
     * Returns champion ID
     * @return int
     */
    public function getChampionId()
    {
        return $this->championId;
    }

    /**
     * Returns tags to return additional data.
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ChampionById\Request::champData
     * @return null|\string[]
     * @throws \Exception
     */
    public function getChampData()
    {
        if(!($this->isChampDataSpecified())) {
            throw new \Exception("Champ data is not specified");
        }

        return $this->champData;
    }

    /**
     * Returns true if tags to return additional data are specified
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ChampionById\Request::champData
     * @return bool
     */
    public function isChampDataSpecified()
    {
        return $this->champData !== null;
    }

    /**
     * Specify tags to return additional data.
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ChampionById\Request::champData
     * @param string[] $champData
     */
    public function specifyChampData(array $champData)
    {
        $this->champData = $champData;
    }
}