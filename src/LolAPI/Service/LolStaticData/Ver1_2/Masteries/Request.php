<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Masteries;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;
use LolAPI\Service\LolStaticData\Component\DataDragonRequest;

class Request extends DataDragonRequest
{
    /**
     * Tags to return additional data.
     * Only type, version, data, id, name, and description are returned by default if this parameter isn't specified.
     * To return all additional data, use the tag 'all'.
     *
     * Available options: all image masteryTree prereq ranks sanitizedDescription tree
     *
     * @var string[]|null
     */
    private $masteryListData;

    /**
     * LolStaticData.Masteries request
     * @param APIKey $APIKey
     * @param RegionalEndpointInterface $regionalEndpoint
     */
    public function __construct(APIKey $APIKey, RegionalEndpointInterface $regionalEndpoint)
    {
        $this->apiKey = $APIKey;
        $this->regionalEndpoint = $regionalEndpoint;
    }

    /**
     * Returns true if tags to return additional data are specified
     * @see LolAPI\Service\LolStaticData\Ver1_2\Masteries\Request::masteryListData
     * @return bool
     */
    public function isMasteryListDataSpecified()
    {
        return $this->masteryListData !== null;
    }

    /**
     * Returns tags to return additional data
     * @see LolAPI\Service\LolStaticData\Ver1_2\Masteries\Request::masteryListData
     * @return string[]
     * @throws \Exception
     */
    public function getMasteryListData()
    {
        if(!($this->isMasteryListDataSpecified())) {
            throw new \Exception('MasteryListData is not specified');
        }

        return $this->masteryListData;
    }

    /**
     * Specify tags to return additional data
     * @see LolAPI\Service\LolStaticData\Ver1_2\Masteries\Request::masteryListData
     * @param string[] $masteryListData
     */
    public function specifyMasteryListData(array $masteryListData)
    {
        $this->masteryListData = $masteryListData;
    }
}
