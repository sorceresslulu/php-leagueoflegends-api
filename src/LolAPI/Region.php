<?php
namespace LolAPI;

interface Region
{
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