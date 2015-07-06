<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\SummonerSpellById;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;
use LolAPI\Service\LolStaticData\Component\DataDragonRequest;

class Request extends DataDragonRequest
{
    /**
     * Summoner Spell Id
     * @var int
     */
    private $summonerSpellId;

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
     * @param int $summonerSpellId
     */
    public function __construct(APIKey $apiKey, RegionalEndpointInterface $regionalEndpoint, $summonerSpellId)
    {
        $this->apiKey = $apiKey;
        $this->regionalEndpoint = $regionalEndpoint;
        $this->summonerSpellId = $summonerSpellId;
    }

    /**
     * Returns summonerSpellId
     * @return int
     */
    public function getSummonerSpellId()
    {
        return $this->summonerSpellId;
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
