<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\ItemById;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;
use LolAPI\Service\LolStaticData\Component\DataDragonRequest;

class Request extends DataDragonRequest
{
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
     * Returns item ID
     * @return int
     */
    public function getItemId()
    {
        return $this->itemId;
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