<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Realm\DTO;

class RealmDTO
{
    /**
     * The base CDN url
     * @var string
     */
    private $cdnUrl;

    /**
     * Latest changed version of Dragon Magic's css file.
     * @var string
     */
    private $dmCssFile;

    /**
     * Latest changed version of Dragon Magic.
     * @var string
     */
    private $dmLastChangedVersion;

    /**
     * Default language for this realm.
     * @var string
     */
    private $defaultLanguage;

    /**
     * Legacy script mode for IE6 or older.
     * @var string
     */
    private $legacyScriptModeForIE6;

    /**
     * Special behavior number identifying the largest profile icon id that can be used under 500.
     * Any profile icon that is requested between this number and 500 should be mapped to 0.
     * @var int
     */
    private $profileIconMax;

    /**
     * Latest changed version for each data type listed
     * @var string[]
     */
    private $lastChangedVersions;

    /**
     * Additional api data drawn from other sources that may be related to data dragon functionality.
     * @var string|null
     */
    private $store;

    /**
     * Current version of this file for this realm.
     * @var string
     */
    private $version;

    public function __construct($cdnUrl, $dmCssFile, $dmLastChangedVersion, $defaultLanguage, $legacyScriptModeForIE6, $profileIconMax, array $lastChangedVersions, $store, $version)
    {
        $this->cdnUrl = $cdnUrl;
        $this->dmCssFile = $dmCssFile;
        $this->dmLastChangedVersion = $dmLastChangedVersion;
        $this->defaultLanguage = $defaultLanguage;
        $this->legacyScriptModeForIE6 = $legacyScriptModeForIE6;
        $this->profileIconMax = $profileIconMax;
        $this->lastChangedVersions = $lastChangedVersions;
        $this->store = $store;
        $this->version = $version;
    }

    /**
     * Returns base CDN url
     * @return string
     */
    public function getCdnUrl()
    {
        return $this->cdnUrl;
    }

    /**
     * Returns latest changed version of Dragon Magic's css file.
     * @return string
     */
    public function getDmCssFile()
    {
        return $this->dmCssFile;
    }

    /**
     * Returns latest changed version of Dragon Magic.
     * @return string
     */
    public function getDmLastChangedVersion()
    {
        return $this->dmLastChangedVersion;
    }

    /**
     * Returns default language for this realm.
     * @return string
     */
    public function getDefaultLanguage()
    {
        return $this->defaultLanguage;
    }

    /**
     * Returns legacy script mode for IE6 or older.
     * @return string
     */
    public function getLegacyScriptModeForIE6()
    {
        return $this->legacyScriptModeForIE6;
    }

    /**
     * Returns special behavior number identifying the largest profile icon id that can be used under 500.
     * Any profile icon that is requested between this number and 500 should be mapped to 0.
     * @return int
     */
    public function getProfileIconMax()
    {
        return $this->profileIconMax;
    }

    /**
     * Returns latest changed version for each data type listed.
     * @return string[]
     */
    public function getLastChangedVersions()
    {
        return $this->lastChangedVersions;
    }

    /**
     * Returns additional api data drawn from other sources that may be related to data dragon functionality.
     * @return string|null
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * Returns current version of this file for this realm.
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }
}