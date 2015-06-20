<?php
namespace LolAPI;

interface Region
{
    public function getCode();
    public function getDomain();
    public function getDirectory();
}