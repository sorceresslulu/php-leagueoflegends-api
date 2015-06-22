<?php
namespace LolAPI\Service\FeaturedGame\Ver1_0;

use LolAPI\Handler\HandlerInterface;
use LolAPI\Service\Exceptions\ForbiddenException;
use LolAPI\Service\Exceptions\RateLimitExceedException;
use LolAPI\Service\Exceptions\UnknownResponseException;

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
     * FeaturedGames query
     * @param HandlerInterface $lolAPIHandler
     * @param Request $request
     */
    public function __construct(HandlerInterface $lolAPIHandler, Request $request)
    {
        $this->lolAPIHandler = $lolAPIHandler;
        $this->request = $request;
    }

    /**
     * @return HandlerInterface
     */
    private function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }

    /**
     * @return Request
     */
    private function getRequest()
    {
        return $this->request;
    }

    public function execute()
    {
        $request = $this->getRequest();

        $urlParams = array(
            'api_key' => $request->getApiKey()->toParam()
        );

        $serviceUrl = sprintf(
            'https://%s.api.pvp.net/observer-mode/rest/featured',
            rawurlencode($request->getRegion()->getDomain()),
            rawurlencode($request->getRegion()->getDirectory())
        );

        $response = $this->getLolAPIHandler()->exec($serviceUrl, $urlParams);

        if($response->isSuccessful()) {
            $queryResultBuilder = new QueryResultBuilder();

            return $queryResultBuilder->build($response);
        }else{
            switch($response->getHttpCode()) {
                default:
                    throw new UnknownResponseException($response->getHttpCode());

                case 403: throw new ForbiddenException($response->getHttpCode());
                case 429: throw new RateLimitExceedException($response->getHttpCode());
            }
        }
    }
}