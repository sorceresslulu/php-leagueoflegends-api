<?php
namespace LolAPI\Handler;

interface LolAPIHandlerInterface
{
    /**
     * Execute RIOT API call
     * Returns a response object
     * @param string $queryType Query type. Use it for your caching purposes.
     * @param string $serviceURL Service URL
     * @param array $params Params
     * @return LolAPIResponseInterface
     */
    public function exec($queryType, $serviceURL, array $params);
}