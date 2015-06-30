<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO;

class Incident
{
    /**
     * ID
     * @var int
     */
    private $id;

    /**
     * Is active?
     * @var bool
     */
    private $active;

    /**
     * Created at
     * @var string
     */
    private $createdAt;

    /**
     * Updates
     * @var Message[]
     */
    private $updates;

    public function __construct($id, $active, $createdAt, array $updates)
    {
        $this->id = $id;
        $this->active = $active;
        $this->createdAt = $createdAt;
        $this->updates = $updates;
    }

    /**
     * Returns ID
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns true if is active
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Returns created_at
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Returns list of updates
     * @return Message[]
     */
    public function getUpdates()
    {
        return $this->updates;
    }

    /**
     * Returns true if there are any updates of this incident
     * @return bool
     */
    public function hasUpdates()
    {
        return count($this->updates) > 0;
    }
}