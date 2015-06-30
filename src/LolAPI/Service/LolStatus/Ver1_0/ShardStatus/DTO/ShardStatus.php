<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO;


class ShardStatus
{
    /**
     * Name
     * @var string
     */
    private $name;

    /**
     * Hostname
     * @var string
     */
    private $hostname;

    /**
     * List of locales
     * @var string
     */
    private $locales;

    /**
     * Region tag
     * @var string
     */
    private $regionTag;

    /**
     * Services
     * @var ShardService[]
     */
    private $services;

    /**
     * Slug
     * @var string
     */
    private $slug;

    public function __construct($name, $hostname, array $locales, $regionTag, array $services, $slug)
    {
        $this->name = $name;
        $this->hostname = $hostname;
        $this->locales = $locales;
        $this->regionTag = $regionTag;
        $this->services = $services;
        $this->slug = $slug;
    }

    /**
     * Returns name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns hostname
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * Returns list of locales
     * @return string
     */
    public function getLocales()
    {
        return $this->locales;
    }

    /**
     * Returns list of region tag
     * @return string
     */
    public function getRegionTag()
    {
        return $this->regionTag;
    }

    /**
     * Returns list of services
     * @return ShardService[]
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * Returns slug
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}