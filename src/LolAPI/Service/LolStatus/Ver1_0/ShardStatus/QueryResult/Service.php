<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult;

use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Status\StatusInterface;

class Service
{
    /**
     * Service name
     * @var string
     */
    private $name;

    /**
     * Slug
     * @var string
     */
    private $slug;

    /**
     * Status
     * @var StatusInterface
     */
    private $status;

    /**
     * Incidents
     * @var Incident[]
     */
    private $incidents = array();

    public function __construct($name, $slug, StatusInterface $status, array $incidents)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->status = $status;
        $this->incidents = $incidents;
    }

    /**
     * Returns service name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns slug
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Returns status
     * @return StatusInterface
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns list of incidents
     * @return Incident[]
     */
    public function getIncidents()
    {
        return $this->incidents;
    }

    /**
     * Returns true if service has incidents
     * @return bool
     */
    public function hasIncidents()
    {
        return count($this->incidents) > 0;
    }
}