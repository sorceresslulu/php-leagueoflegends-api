<?php
namespace LolAPI\Service\Summoner\Ver1_4\ByIds\Response;

class SummonerDTO
{
    /**
     * Summoner ID
     * @var int
     */

    private $id;

    /**
     * Summoner name.
     * @var string
     */
    private $name;

    /**
     * ID of the summoner icon associated with the summoner.
     * @var int
     */
    private $profileIconId;

    /**
     * Date summoner was last modified specified as epoch milliseconds.
     * @var int
     */
    private $revisionDate;

    /**
     * Summoner level associated with the summoner.
     * @var int
     */
    private $summonerLevel;

    public function __construct($id, $name, $profileIconId, $revisionDate, $summonerLevel)
    {
        $this->id = $id;
        $this->name = $name;
        $this->profileIconId = $profileIconId;
        $this->revisionDate = $revisionDate;
        $this->summonerLevel = $summonerLevel;
    }

    /**
     * Returns summoner ID
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns summoner name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns ID of the summoner icon associated with the summoner.
     * @return int
     */
    public function getProfileIconId()
    {
        return $this->profileIconId;
    }

    /**
     * Returns date summoner was last modified specified as epoch milliseconds.
     * @return int
     */
    public function getRevisionDate()
    {
        return $this->revisionDate;
    }

    /**
     * Returns summoner level associated with the summoner.
     * @return int
     */
    public function getSummonerLevel()
    {
        return $this->summonerLevel;
    }
}