<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\ChampionById;

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
     * Champion ID
     * @var int
     */
    private $championId;

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
     * Returns champion ID
     * @return int
     */
    public function getChampionId()
    {
        return $this->championId;
    }

    /**
     * Returns locale code for returned data (e.g., en_US, es_ES).
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ChampionById\Request::locale
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
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ChampionById\Request::locale
     * @param string $locale
     */
    public function specifyLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * Returns true if locale is specified
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ChampionById\Request::locale
     * @return bool
     */
    public function isLocaleSpecified()
    {
        return $this->locale !== null;
    }

    /**
     * Returns data dragon version for returned data.
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ChampionById\Request::version
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
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ChampionById\Request::version
     */
    public function specifyVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Returns true if version is specified
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ChampionById\Request::version
     * @return bool
     */
    public function isVersionSpecified()
    {
        return $this->version !== null;
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
    public function setChampData(array $champData)
    {
        $this->champData = $champData;
    }
}