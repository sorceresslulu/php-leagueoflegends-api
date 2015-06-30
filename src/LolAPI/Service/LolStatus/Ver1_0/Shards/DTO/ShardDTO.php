<?php
namespace LolAPI\Service\LolStatus\Ver1_0\Shards\DTO;

class ShardDTO
{
    /**
     * Hostname
     * @var string
     */
    private $hostname;

    /**
     * List of locales
     * @var string[]
     */
    private $locales;

    /**
     * Name
     * @var string
     */
    private $name;

    /**
     * Region tag
     * @var string
     */
    private $regionTag;

    /**
     * Slug
     * @var string
     */
    private $slug;

    public function __construct($hostname, $locales, $name, $regionTag, $slug)
    {
        $this->hostname = $hostname;
        $this->locales = $locales;
        $this->name = $name;
        $this->regionTag = $regionTag;
        $this->slug = $slug;
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
     * @return \string[]
     */
    public function getLocales()
    {
        return $this->locales;
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
     * Returns region tag
     * @return string
     */
    public function getRegionTag()
    {
        return $this->regionTag;
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