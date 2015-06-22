<?php
namespace LolAPI\Handler;

interface HandlerInterface
{
    /**
     * Execute RIOT API call
     * Returns a response object
     * @param string $serviceURL Service URL
     * @param array $params Params
     * @return ResponseInterface
     */
    public function exec($serviceURL, array $params);
}