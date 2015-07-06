<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Runes;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;
use LolAPI\Service\LolStaticData\Component\DataDragonRequest;

class Request extends DataDragonRequest
{

    /**
     * Tags to return additional data.
     * Only id, name, rune, and description are returned by default if this parameter isn't specified.
     * To return all additional data, use the tag 'all'.
     *
     * Available options: all, colloq, consumeOnFull, consumed, depth, from, gold, hideFromAll, image,
     * inStore, into, maps, requiredChampion, sanitizedChampion, specialRecipe, stacks, stats
     *
     * @var string[]|null
     */
    private $runeData;

    /**
     * LolStaticData.Runes request
     * @param APIKey $APIKey
     * @param RegionalEndpointInterface $regionalEndpoint
     */
    public function __construct(APIKey $APIKey, RegionalEndpointInterface $regionalEndpoint)
    {
        $this->apiKey = $APIKey;
        $this->regionalEndpoint = $regionalEndpoint;
    }

    /**
     * Returns tags to return additional data.
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Rune\Request::runeData
     * @return \string[]
     * @throws \Exception
     */
    public function getRuneData()
    {
        if(!($this->isRuneDataSpecified())) {
            throw new \Exception("RuneData is not specified");
        }

        return $this->runeData;
    }

    /**
     * Specify tags to return additional data.
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Rune\Request::runeData
     * @param string[] $runeData
     */
    public function specifyRuneData(array $runeData)
    {
        $this->runeData = $runeData;
    }

    /**
     * Returns true if  tags to return additional data are specified
     * @see \LolAPI\Service\LolStaticData\Ver1_2\Rune\Request::runeData
     * @return bool
     */
    public function isRuneDataSpecified()
    {
        return $this->runeData !== null;
    }
}
