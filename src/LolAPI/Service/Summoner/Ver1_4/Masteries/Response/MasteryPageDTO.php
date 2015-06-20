<?php
namespace LolAPI\Service\Summoner\Ver1_4\Masteries\Response;

class MasteryPageDTO
{
    /**
     * Mastery page ID.
     * @var int
     */
    private $id;

    /**
     * Indicates if the mastery page is the current mastery page.
     * @var bool
     */
    private $current;

    /**
     * Collection of masteries associated with the mastery page.
     * @var MasteryDTO[]
     */
    private $masteries;

    /**
     * Mastery page name.
     * @var string
     */
    private $name;

    function __construct($id, $current, $masteries, $name)
    {
        $this->id = $id;
        $this->current = $current;
        $this->masteries = $masteries;
        $this->name = $name;
    }

    /**
     * Returns mastery page ID.
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns true if the mastery page is the current mastery page.
     * @return boolean
     */
    public function isCurrent()
    {
        return $this->current;
    }

    /**
     * Returns collection of masteries associated with the mastery page.
     * @return MasteryDTO[]
     */
    public function getMasteries()
    {
        return $this->masteries;
    }

    /**
     * Returns true if there is any collection of masteries set
     * @return bool
     */
    public function hasMasteries()
    {
        return count($this->masteries) > 0;
    }

    /**
     * Returns mastery page name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}