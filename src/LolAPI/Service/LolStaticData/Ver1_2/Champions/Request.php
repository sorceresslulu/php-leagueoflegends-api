<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Champions;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;

class Request
{
    /**
     * API Key
     * @var APIKey
     */
    private $apiKey;

    /**
     * Regional endpoint
     * @var RegionalEndpointInterface
     */
    private $regionalEndpoint;

    /**
     * Locale code for returned data (e.g., en_US, es_ES).
     * If not specified, the default locale for the region is used.
     * @var string|null
     */
    private $locale;

    /**
     * Data dragon version for returned data.
     * If not specified, the latest version for the region is used.
     * List of valid versions can be obtained from the /versions endpoint.
     * @var string|null
     */
    private $version;

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
     * Returns API key
     * @return APIKey
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Returns regional endpoint
     * @return RegionalEndpointInterface
     */
    public function getRegionalEndpoint()
    {
        return $this->regionalEndpoint;
    }

    /**
     * Returns locale code for returned data (e.g., en_US, es_ES).
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Champions\Request::locale
     * @return string
     * @throws \Exception
     */
    public function getLocale()
    {
        if(!($this->isLocaleSpecified())) {
            throw new \Exception('Locale is not specified');
        }

        return $this->locale;
    }

    /**
     * Specify locale code for returned data (e.g., en_US, es_ES).
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Champions\Request::locale
     * @param string $locale
     */
    public function specifyLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * Returns true if locale is specified
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Champions\Request::locale
     * @return bool
     */
    public function isLocaleSpecified()
    {
        return $this->locale !== null;
    }

    /**
     * Returns data dragon version for returned data.
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Champions\Request::version
     * @return string
     * @throws \Exception
     */
    public function getVersion()
    {
        if(!($this->isVersionSpecified())) {
            throw new \Exception("Version is not specified");
        }

        return $this->version;
    }

    /**
     * Specify data dragon version for returned data.
     * @param string $version
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Champions\Request::version
     */
    public function specifyVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Returns true if version is specified
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Champions\Request::version
     * @return bool
     */
    public function isVersionSpecified()
    {
        return $this->version !== null;
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