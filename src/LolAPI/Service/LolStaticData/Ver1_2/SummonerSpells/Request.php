<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\SummonerSpells;

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
     * Only type, version, data, id, key, name, description, and summonerLevel are returned by default if this parameter isn't specified.
     * To return all additional data, use the tag 'all'.
     *
     * Available options: all cooldown cooldownBurn cost costBurn costType effect effectBurn image key leveltip maxrank
     * modes range rangeBurn resource sanitizedDescription sanitizedTooltip tooltip vars
     *
     * @var string[]|null
     */
    private $spellData;

    /**
     * LolStaticData.SummonerSpells request
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
     * @see \LolAPI\Service\LolStaticData\Ver1_2\SummonerSpells\Request::locale
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
     * @see \LolAPI\Service\LolStaticData\Ver1_2\SummonerSpells\Request::locale
     * @param string $locale
     */
    public function specifyLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * Returns true if locale is specified
     * @see \LolAPI\Service\LolStaticData\Ver1_2\SummonerSpells\Request::locale
     * @return bool
     */
    public function isLocaleSpecified()
    {
        return $this->locale !== null;
    }

    /**
     * Returns data dragon version for returned data.
     * @see \LolAPI\Service\LolStaticData\Ver1_2\SummonerSpells\Request::version
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
     * @see \LolAPI\Service\LolStaticData\Ver1_2\SummonerSpells\Request::version
     */
    public function specifyVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Returns true if version is specified
     * @see \LolAPI\Service\LolStaticData\Ver1_2\SummonerSpells\Request::version
     * @return bool
     */
    public function isVersionSpecified()
    {
        return $this->version !== null;
    }

    /**
     * Enabled dataById flag
     * @see \LolAPI\Service\LolStaticData\Ver1_2\SummonerSpells\Request::dataById
     */
    public function enableDataById()
    {
        $this->dataById = true;
    }

    /**
     * (force) Disable dataById flag
     * @see \LolAPI\Service\LolStaticData\Ver1_2\SummonerSpells\Request::dataById
     */
    public function disableDataById()
    {
        $this->dataById = false;
    }

    /**
     * Returns true if dataById flag is enabled
     * @see \LolAPI\Service\LolStaticData\Ver1_2\SummonerSpells\Request::dataById
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
     * @see \LolAPI\Service\LolStaticData\Ver1_2\SummonerSpells\Request::dataById
     * @return bool
     */
    public function isDataByIdFlagSpecified()
    {
        return $this->dataById !== null;
    }

    /**
     * @see \LolAPI\Service\LolStaticData\Ver1_2\SummonerSpells\Request::spellData
     * @return string[]
     * @throws \Exception
     */
    public function getSpellData()
    {
        if(!($this->isSpellDataSpecified())) {
            throw new \Exception("spellData is not specified");
        }

        return $this->spellData;
    }

    /**
     * Returns true if tags to return additional data. are specified
     * @see \LolAPI\Service\LolStaticData\Ver1_2\SummonerSpells\Request::spellData
     * @return bool
     */
    public function isSpellDataSpecified()
    {
        return $this->spellData !== null;
    }

    /**
     * Specify tags to return additional data
     * @see \LolAPI\Service\LolStaticData\Ver1_2\SummonerSpells\Request::spellData
     * @param string[] $spellData
     */
    public function specifySpellData($spellData)
    {
        $this->spellData = $spellData;
    }
}
