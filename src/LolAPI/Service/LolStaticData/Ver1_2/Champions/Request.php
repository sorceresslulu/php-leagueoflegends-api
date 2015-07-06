<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Champions;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;
use LolAPI\Service\LolStaticData\Component\DataDragonRequest;

class Request extends DataDragonRequest
{
    /**
     * If specified as true, the returned data map will use the champions' IDs as the keys.
     * If not specified or specified as false, the returned data map will use the champions' keys instead.
     * @var bool
     */
    private $dataById;

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
     * LolStaticData.Champions request
     * @param APIKey $apiKey
     * @param RegionalEndpointInterface $regionalEndpoint
     */
    public function __construct(APIKey $apiKey, RegionalEndpointInterface $regionalEndpoint)
    {
        $this->apiKey = $apiKey;
        $this->regionalEndpoint = $regionalEndpoint;
    }

    /**
     * Enabled dataById flag
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Champions\Request::dataById
     */
    public function enableDataById()
    {
        $this->dataById = true;
    }

    /**
     * (force) Disable dataById flag
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Champions\Request::dataById
     */
    public function disableDataById()
    {
        $this->dataById = false;
    }

    /**
     * Returns true if dataById flag is enabled
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Champions\Request::dataById
     * @return bool
     * @throws \Exception
     */
    public function isDataByIdEnabled()
    {
        if(!($this->isDataByIdFlagSpecified())) {
            throw new \Exception('dataById flag is not specified');
        }

        return $this->dataById === true;
    }

    /**
     * Returns true if dataById flag was specified
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Champions\Request::dataById
     * @return bool
     */
    public function isDataByIdFlagSpecified()
    {
        return $this->dataById !== null;
    }

    /**
     * Returns tags to return additional data.
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Champions\Request::champData
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
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Champions\Request::champData
     * @return bool
     */
    public function isChampDataSpecified()
    {
        return $this->champData !== null;
    }

    /**
     * Specify tags to return additional data.
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Champions\Request::champData
     * @param string[] $champData
     */
    public function specifyChampData(array $champData)
    {
        $this->champData = $champData;
    }
}