<?php
namespace LolAPI\Service\Champion\Ver1_2\Champion\Response;

class ChampionDTO
{
    /**
     * Champion ID
     * @var int
     */
    private $id;

    /**
     * Indicates if the champion is active
     * @var bool
     */
    private $active;

    /**
     * Bot enabled flag (for custom games)
     * @var bool
     */
    private $botEnabled;

    /**
     * Bot Match Made enabled flag (for Co-op vs. AI games)
     * @var bool
     */
    private $botMmEnabled;

    /**
     * Indicates if the champion is free to play. Free to play champions are rotated periodically
     * @var bool
     */
    private $freeToPlay;

    /**
     * Ranked play enabled flag
     * @var bool
     */
    private $rankedPlayEnabled;

    function __construct($id, $active, $botEnabled, $botMmEnabled, $freeToPlay, $rankedPlayEnabled)
    {
        $this->id = $id;
        $this->active = $active;
        $this->botEnabled = $botEnabled;
        $this->botMmEnabled = $botMmEnabled;
        $this->freeToPlay = $freeToPlay;
        $this->rankedPlayEnabled = $rankedPlayEnabled;
    }

    /**
     * Returns champion ID
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns true if the champion is active
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Returns true if champion is bot enabled (for custom games)
     * @return boolean
     */
    public function isBotEnabled()
    {
        return $this->botEnabled;
    }

    /**
     * Returns true if champion if bot enabled (for Co-op vs. AI games)
     * @return boolean
     */
    public function isBotMmEnabled()
    {
        return $this->botMmEnabled;
    }

    /**
     * Returns true if champion is free to play
     * @return boolean
     */
    public function isFreeToPlay()
    {
        return $this->freeToPlay;
    }

    /**
     * Returns true if champion enabled for rankeds
     * @return boolean
     */
    public function isRankedPlayEnabled()
    {
        return $this->rankedPlayEnabled;
    }
}