<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\ItemById;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;

class Request
{
    /**
     * API key
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
     * Item ID
     * @var int
     */
    private $itemId;

    /**
     * Tags to return additional data.
     * Only type, version, basic, data, id, name, plaintext, group, and description are returned by default if this parameter isn't specified.
     * To return all additional data, use the tag 'all'.
     *
     * Available options: all colloq consumeOnFull consumed depth from gold groupd hideFromAll image inStore into
     * maps requiredChampion sanitizedDescription specialRecipe stacks stats tags
     *
     * @var string[]|null
     */
    private $itemListData;

    /**
     * LolStaticData.ItemById request
     * @param APIKey $apiKey
     * @param RegionalEndpointInterface $regionalEndpoint
     * @param int $itemId
     */
    public function __construct(APIKey $apiKey, RegionalEndpointInterface $regionalEndpoint, $itemId)
    {
        $this->apiKey = $apiKey;
        $this->regionalEndpoint = $regionalEndpoint;
        $this->itemId = $itemId;
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
     * Returns item ID
     * @return int
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Returns locale code for returned data (e.g., en_US, es_ES).
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ItemById\Request::locale
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
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ItemById\Request::locale
     * @param string $locale
     */
    public function specifyLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * Returns true if locale is specified
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ItemById\Request::locale
     * @return bool
     */
    public function isLocaleSpecified()
    {
        return $this->locale !== null;
    }

    /**
     * Returns data dragon version for returned data.
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ItemById\Request::version
     * @return string
     * @throws \Exception
     */
    public function getVersion()
    {
        if(!($this->isVersionSpecified())) {
            throw new \Exception('Version is not specified');
        }

        return $this->version;
    }

    /**
     * Specify data dragon version for returned data.
     * @param string $version
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ItemById\Request::version
     */
    public function specifyVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Returns true if version is specified
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ItemById\Request::version
     * @return bool
     */
    public function isVersionSpecified()
    {
        return $this->version !== null;
    }

    /**
     * Returns tags to return additional data.
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ItemById\Request::itemListData
     * @return \string[]
     * @throws \Exception
     */
    public function getItemListData()
    {
        if(!($this->isItemListDataSpecified())) {
            throw new \Exception('ItemListData is not specified');
        }

        return $this->itemListData;
    }

    /**
     * Specify tags to return additional data.
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ItemById\Request::itemListData
     * @param array $itemListData
     */
    public function specifyItemListData(array $itemListData)
    {
        $this->itemListData = $itemListData;
    }

    /**
     * Returns true if  tags to return additional data are specified
     * @see \LolAPI\Service\LolStaticData\Ver1_2\ItemById\Request::itemListData
     * @return bool
     */
    public function isItemListDataSpecified()
    {
        return $this->itemListData !== null;
    }
}