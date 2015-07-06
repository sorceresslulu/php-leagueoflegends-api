<?php
namespace LolAPI\GameConstants\SubType;

interface SubTypeFactoryInterface
{
    /**
     * Create and returns subType from string code
     * @param string $stringCode
     * @return SubTypeInterface;
     */
    public function createFromStringCode($stringCode);
}