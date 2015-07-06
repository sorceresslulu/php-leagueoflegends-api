<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Realm;

use LolAPI\Exceptions\BadRequestException;
use LolAPI\Exceptions\InternalServerException;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\ServiceUnavailableException;
use LolAPI\Exceptions\UnauthorizedException;
use LolAPI\Exceptions\UnknownResponseException;
use LolAPI\GameConstants\RegionalEndpoint\Endpoints\GlobalRegionalEndpoint;
use LolAPI\Handler\LolAPIHandlerInterface;

class Query
{
    const QUERY_TYPE = 'lol-status-ver1.0-realm';

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
     * LolStaticData.Runes query
     * @param LolAPIHandlerInterface $lolAPIHandler
     * @param Request $request
     */
    public function __construct(LolAPIHandlerInterface $lolAPIHandler, Request $request)
    {
        $this->lolAPIHandler = $lolAPIHandler;
        $this->request = $request;
    }

    /**
     * Execute query
     * @return \LolAPI\Handler\LolAPIResponseInterface
     * @throws LolAPIException
     * @throws \Exception
     */
    public function execute()
    {
        $request = $this->getRequest();
        $globalEndpoint = new GlobalRegionalEndpoint();

        $urlParams = array(
            'api_key' => $request->getApiKey()->toParam()
        );

        if($request->isLocaleSpecified()) {
            $urlParams['locale'] = $request->getLocale();
        }

        if($request->isVersionSpecified()) {
            $urlParams['version'] = $request->getVersion();
        }

        if ($request->getRegionalEndpoint()->hasRegionCode()) {
            $serviceUrl = sprintf(
                'https://%s/api/lol/static-data/%s/v1.2/realm',
                $globalEndpoint->getHost(),
                strtolower($request->getRegionalEndpoint()->getRegionCode())
            );
        } else {
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
                case 429: throw new RateLimitExceedException($response); // Note: Requests to this API will not be counted in your Rate Limit.
                case 500: throw new InternalServerException($response);
                case 503: throw new ServiceUnavailableException($response);
            }
        }
    }

    /**
     * Lol API Handler
     * @return LolAPIHandlerInterface
     */
    protected function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }

    /**
     * Request
     * @return Request
     */
    protected function getRequest()
    {
        return $this->request;
    }
}
