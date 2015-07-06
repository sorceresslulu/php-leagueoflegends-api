<?php
namespace LolAPI\Service\Champion\Ver1_2\Champion;

use LolAPI\Exceptions\BadRequestException;
use LolAPI\Exceptions\ChampionNotFoundException;
use LolAPI\Exceptions\InternalServerException;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\ServiceUnavailableException;
use LolAPI\Exceptions\UnauthorizedException;
use LolAPI\Exceptions\UnknownResponseException;
use LolAPI\Handler\LolAPIHandlerInterface;
use LolAPI\Handler\LolAPIResponseInterface;

class Query
{
    const QUERY_TYPE = "champion-ver1.2-champion";

    /**
     * Lol API Handler
     * @var LolAPIHandlerInterface
     */
    private $lolAPIHandler;

    /**
     * Request
     * @var Request
     */
    private $request;

    /**
     * Champion.Champion query
     * @param LolAPIHandlerInterface $handler
     * @param Request $request
     */
    public function __construct(LolAPIHandlerInterface $handler, Request $request) {
        $this->lolAPIHandler = $handler;
        $this->request = $request;
    }

    /**
     * Returns Lol API Handler
     * @return LolAPIHandlerInterface
     */
    private function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }

    /**
     * Returns request
     * @return Request
     */
    private function getRequest()
    {
        return $this->request;
    }

    /**
     * Execute query
     * @return LolAPIResponseInterface
     * @throws LolAPIException
     * @throws \Exception
     */
    public function execute()
    {
        $request = $this->getRequest();

        $urlParams = array(
            'api_key' => $request->getApiKey()->toParam(),
            'id' => $request->getChampionId()
        );

        if($request->getRegionalEndpoint()->hasRegionCode()) {
            $serviceUrl = sprintf(
                'https://%s/api/lol/%s/v1.2/champion/%d',
                rawurlencode($request->getRegionalEndpoint()->getHost()),
                rawurlencode(strtolower($request->getRegionalEndpoint()->getRegionCode())),
                rawurlencode($request->getChampionId())
            );
        }else{
            throw new \Exception(sprintf("Query cannot be executed for regional endpoint `%s`", $request->getRegionalEndpoint()->getPlatformId()));
        }

        $response = $this->getLolAPIHandler()->exec(self::QUERY_TYPE, $serviceUrl, $urlParams);

        if($response->isSuccessful()) {
            return $response;
        }else{
            switch($response->getHttpCode()) {
                default:
                    throw new UnknownResponseException($response);

                case 400: throw new BadRequestException($response);
                case 401: throw new UnauthorizedException($response);
                case 404: throw new ChampionNotFoundException($response);
                case 429: throw new RateLimitExceedException($response);
                case 500: throw new InternalServerException($response);
                case 503: throw new ServiceUnavailableException($response);
            }
        }
    }
}