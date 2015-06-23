<?php
namespace LolAPI;

interface Platform
{
    const PLATFORM_BR1 = 'BR1';
    const PLATFORM_EUN1 = 'EUN1';
    const PLATFORM_EUW1 = 'EUW1';
    const PLATFORM_KR = 'KR';
    const PLATFORM_LA1 = 'LA1';
    const PLATFORM_LA2 = 'LA2';
    const PLATFORM_NA1 = 'NA1';
    const PLATFORM_OC1 = 'OC1';
    const PLATFORM_RU = 'RU';
    const PLATFORM_TR1 = 'TR1';

    /**
     * Returns platform ID
     * @return string
     */
    public function getPlatformId();

    /**
     * Returns path part for CurrentGame.SpectatorGameInfo query
     * @return string
     */
    public function getCurrentGamePathParam();
}