<?php
namespace LolAPI\Handler\CURL;

use LolAPI\Handler\HandlerInterface;
use LolAPI\Handler\ResponseInterface;

class Handler implements HandlerInterface
{
    /**
     * Execute RIOT API call
     * Returns a response object
     * @param string $serviceURL Service URL
     * @param array $params Params
     * @return ResponseInterface
     */
    public function exec($serviceURL, array $params)
    {
        if(count($params)) {
            $urlParams = array();

            foreach($params as $paramName => $paramValue) {
                $urlParams[] = rawurlencode($paramName).'='.urlencode($paramValue);
            } // so sad map_reduce won't work with hashes

            $serviceURL .= '?' . implode('&', $urlParams);
        }

        $curlHandler = curl_init();

        curl_setopt($curlHandler, CURLOPT_URL, $serviceURL);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curlHandler);

        return new Response(
            (int) curl_getinfo($curlHandler, CURLINFO_HTTP_CODE),
            $response
        );
    }
}