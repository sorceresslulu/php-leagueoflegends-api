<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo;

use LolAPI\Handler\HandlerInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Exceptions\ForbiddenException;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\SpectatorGameInfoNotFoundException;
use LolAPI\Exceptions\UnauthorizedException;
use LolAPI\Exceptions\UnknownResponseException;
use LolAPI\Platform\PlatformFactory;

class Query
{
    /**
     * Lol API Handler
     * @var HandlerInterface
     */
    private $lolAPIHandler;

    /**
     * Request
     * @var Request
     */
    private $request;

    /**
     * Platform Factory
     * @var PlatformFactory
     */
    private $platformFactory;

    /**
     * CurrentGame.SpectatorGameInfo query
     * @param HandlerInterface $lolAPIHandler
     * @param Request $request
     * @param PlatformFactory $platformFactory
     */
    public function __construct(HandlerInterface $lolAPIHandler, Request $request, PlatformFactory $platformFactory)
    {
        $this->lolAPIHandler = $lolAPIHandler;
        $this->request = $request;
        $this->platformFactory = $platformFactory;
    }

    /**
     * Returns Lol API Handler
     * @return HandlerInterface
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
     * @return PlatformFactory
     */
    private function getPlatformFactory()
    {
        return $this->platformFactory;
    }

    /**
     * Execute query
     * @return QueryResult
     * @throws LolAPIException
     */
    public function execute()
    {
        $request = $this->getRequest();

        $urlParams = array(
            'api_key' => $request->getApiKey()->toParam()
        );

        $serviceUrl = sprintf(
            'https://%s.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/%s/%d',
            rawurlencode($request->getRegion()->getDomain()),
            rawurlencode($request->getPlatformId()->getCurrentGamePathParam()),
            rawurlencode($request->getSummonerId())
        );

        $response = $this->getLolAPIHandler()->exec("current-game-ver1.0-spectator-game-info", $serviceUrl, $urlParams);

        if($response->isSuccessful()) {
            return $this->createQueryResult($response);
        }else{
            switch($response->getHttpCode()) {
                default:
                    throw new UnknownResponseException($response->getHttpCode());

                case 401: throw new UnauthorizedException($response->getHttpCode());
                case 403: throw new ForbiddenException($response->getHttpCode());
                case 429: throw new RateLimitExceedException($response->getHttpCode());
                case 404: throw new SpectatorGameInfoNotFoundException($response->getHttpCode());
            }
        }
    }

    /**
     * Create and returns query result object
     * @param ResponseInterface $response
     * @return QueryResult
     */
    private function createQueryResult(ResponseInterface $response)
    {
        $queryResultBuilder = new QueryResultBuilder();

        return $queryResultBuilder->build($response, $this->getPlatformFactory());
    }
}