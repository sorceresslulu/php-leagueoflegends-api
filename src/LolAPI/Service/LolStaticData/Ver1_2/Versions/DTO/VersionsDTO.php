<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Versions\DTO;

class VersionsDTO
{
    /**
     * Versions
     * @var string[]
     */
    private $versions = array();

    /**
     * Versions DTO
     * @param string[] $versions
     */
    public function __construct(array $versions)
    {
        $this->versions = $versions;
    }

    /**
     * Returns all available versions
     * @return \string[]
     */
    public function getVersions()
    {
        return $this->versions;
    }

    /**
     * Returns last version
     * @return string
     */
    public function getLastVersion()
    {
        return $this->versions[0];
    }
}