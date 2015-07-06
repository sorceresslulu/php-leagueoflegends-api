<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\LanguageStrings;

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
     * LolStaticData.LanguageStrings request
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
     * @see \LolAPI\Service\LolStaticData\Ver1_2\LanguageStrings\Request::locale
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
     * @see \LolAPI\Service\LolStaticData\Ver1_2\LanguageStrings\Request::locale
     * @param string $locale
     */
    public function specifyLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * Returns true if locale is specified
     * @see \LolAPI\Service\LolStaticData\Ver1_2\LanguageStrings\Request::locale
     * @return bool
     */
    public function isLocaleSpecified()
    {
        return $this->locale !== null;
    }

    /**
     * Returns data dragon version for returned data.
     * @see \LolAPI\Service\LolStaticData\Ver1_2\LanguageStrings\Request::version
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
     * @see \LolAPI\Service\LolStaticData\Ver1_2\LanguageStrings\Request::version
     */
    public function specifyVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Returns true if version is specified
     * @see \LolAPI\Service\LolStaticData\Ver1_2\LanguageStrings\Request::version
     * @return bool
     */
    public function isVersionSpecified()
    {
        return $this->version !== null;
    }
}