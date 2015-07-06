<?php
namespace LolAPI\Service\LolStaticData\Component;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;

abstract class DataDragonRequest
{
    /**
     * API Key
     * @var APIKey
     */
    protected $apiKey;

    /**
     * Regional endpoint
     * @var RegionalEndpointInterface
     */
    protected $regionalEndpoint;

    /**
     * Champion ID
     * @var int
     */
    protected $championId;

    /**
     * Locale code for returned data (e.g., en_US, es_ES).
     * If not specified, the default locale for the region is used.
     * @var string|null
     */
    protected $locale;

    /**
     * Data dragon version for returned data.
     * If not specified, the latest version for the region is used.
     * List of valid versions can be obtained from the /versions endpoint.
     * @var string|null
     */
    protected $version;

    /**
     * Returns API key
     * @return APIKey
     */
    public final function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Returns regional endpoint
     * @return RegionalEndpointInterface
     */
    public final function getRegionalEndpoint()
    {
        return $this->regionalEndpoint;
    }

    /**
     * Returns locale code for returned data (e.g., en_US, es_ES).
     * @see \LolAPI\Service\LolStaticData\Component\DataDragonRequest::locale
     * @return string
     * @throws \Exception
     */
    public final function getLocale()
    {
        if(!($this->isLocaleSpecified())) {
            throw new \Exception('Locale is not specified');
        }

        return $this->locale;
    }

    /**
     * Specify locale code for returned data (e.g., en_US, es_ES).
     * @see \LolAPI\Service\LolStaticData\Component\DataDragonRequest::locale
     * @param string $locale
     */
    public final function specifyLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * Returns true if locale is specified
     * @see \LolAPI\Service\LolStaticData\Component\DataDragonRequest::locale
     * @return bool
     */
    public final function isLocaleSpecified()
    {
        return $this->locale !== null;
    }

    /**
     * Returns data dragon version for returned data.
     * @see \LolAPI\Service\LolStaticData\Component\DataDragonRequest::version
     * @return string
     * @throws \Exception
     */
    public final function getVersion()
    {
        if(!($this->isVersionSpecified())) {
            throw new \Exception("Version is not specified");
        }

        return $this->version;
    }

    /**
     * Specify data dragon version for returned data.
     * @param string $version
     * @see \LolAPI\Service\LolStaticData\Component\DataDragonRequest::version
     */
    public final function specifyVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Returns true if version is specified
     * @see \LolAPI\Service\LolStaticData\Component\DataDragonRequest::version
     * @return bool
     */
    public final function isVersionSpecified()
    {
        return $this->version !== null;
    }
}