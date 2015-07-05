<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Rune;

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
     * Rune ID
     * @var int
     */
    private $runeId;

    /**
     * Locale code for returned data (e.g., en_US, es_ES).
     * If not specified, the default locale for the region is used.
     * @var string
     */
    private $locale;

    /**
     * Data dragon version for returned data.
     * If not specified, the latest version for the region is used.
     * List of valid versions can be obtained from the /versions endpoint.
     * @var string
     */
    private $version;

    /**
     * Tags to return additional data.
     * Only id, name, rune, and description are returned by default if this parameter isn't specified.
     * To return all additional data, use the tag 'all'.
     *
     * Available options: all, colloq, consumeOnFull, consumed, depth, from, gold, hideFromAll, image,
     * inStore, into, maps, requiredChampion, sanitizedChampion, specialRecipe, stacks, stats
     *
     * @var string[]
     */
    private $runeData;

    /**
     * LolStaticData.Rune request
     * @param APIKey $apiKey
     * @param RegionalEndpointInterface $regionalEndpoint
     * @param int $runeId
     */
    public function __construct(APIKey $apiKey, RegionalEndpointInterface $regionalEndpoint, $runeId)
    {
        $this->apiKey = $apiKey;
        $this->regionalEndpoint = $regionalEndpoint;
        $this->runeId = $runeId;
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
     * Returns rune ID
     * @return int
     */
    public function getRuneId()
    {
        return $this->runeId;
    }

    /**
     * Returns locale code for returned data (e.g., en_US, es_ES).
     * @see \LolAPI\Service\Ver1_2\Rune\Request::locale
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Specify locale code for returned data (e.g., en_US, es_ES).
     * @see \LolAPI\Service\Ver1_2\Rune\Request::locale
     * @param string $locale
     */
    public function specifyLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * Returns true if locale is specified
     * @see \LolAPI\Service\Ver1_2\Rune\Request::locale
     * @return bool
     */
    public function isLocaleSpecified()
    {
        return $this->locale !== null;
    }

    /**
     * Returns data dragon version for returned data.
     * @see \LolAPI\Service\Ver1_2\Rune\Request::version
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Specify data dragon version for returned data.
     * @param string $version
     * @see \LolAPI\Service\Ver1_2\Rune\Request::version
     */
    public function specifyVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Returns true if version is specified
     * @see \LolAPI\Service\Ver1_2\Rune\Request::version
     * @return bool
     */
    public function isVersionSpecified()
    {
        return $this->version !== null;
    }

    /**
     * Returns tags to return additional data.
     * @see \LolAPI\Service\Ver1_2\Rune\Request::runeData
     * @return string[]
     */
    public function getRuneData()
    {
        return $this->runeData;
    }

    /**
     * Specify tags to return additional data.
     * @see \LolAPI\Service\Ver1_2\Rune\Request::runeData
     * @param string[] $runeData
     */
    public function specifyRuneData(array $runeData)
    {
        $this->runeData = $runeData;
    }

    /**
     * Returns true if  tags to return additional data are specified
     * @see \LolAPI\Service\Ver1_2\Rune\Request::runeData
     * @return bool
     */
    public function isRuneDataSpecified()
    {
        return $this->runeData !== null;
    }
}