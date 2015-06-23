<?php
namespace LolAPI;

interface Region
{
    const REGION_BR = 'BR';
    const REGION_EUNE = 'EUNE';
    const REGION_EUW = 'EUW';
    const REGION_KR = 'KR';
    const REGION_LAN = 'LAN';
    const REGION_LAS = 'LAS';
    const REGION_NA = 'NA';
    const REGION_OCE = 'OCE';
    const REGION_PBE = 'PBE';
    const REGION_RU = 'RU';
    const REGION_TR = 'TR';

    /**
     * Returns code
     * @return string
     */
    public function getCode();

    /**
     * Returns domain
     * @return string
     */
    public function getDomain();

    /**
     * Returns directory (url)
     * @return string
     */
    public function getDirectory();
}