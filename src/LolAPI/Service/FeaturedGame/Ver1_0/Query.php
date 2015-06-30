<?php
namespace LolAPI\Service\FeaturedGame\Ver1_0;

use LolAPI\Exceptions\LolAPIException;
use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\GameType\GameTypeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueTypeFactory;
use LolAPI\GameConstants\Platform\PlatformFactory;
use LolAPI\Handler\HandlerInterface;
use LolAPI\Exceptions\ForbiddenException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\UnknownResponseException;
use LolAPI\Handler\ResponseInterface;

class Query
{
    const QUERY_TYPE = "featured-game-ver1.0";

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
    public function __construct(HandlerInterface $lolAPIHandler, Request $request){
        $this->lolAPIHandler = $lolAPIHandler;
        $this->request = $request;
    }

    /**
     * Execute Query
     * @return ResponseInterface
     * @throws LolAPIException
     */
    public function execute()
    {
        $request = $this->getRequest();

        $urlParams = array(
            'api_key' => $request->getApiKey()->toParam()
        );

        $serviceUrl = sprintf(
            'https://%s/observer-mode/rest/featured',
            rawurlencode($request->getRegionalEndpoint()->getHost())
        );

        $response = $this->getLolAPIHandler()->exec(self::QUERY_TYPE, $serviceUrl, $urlParams);

        if($response->isSuccessful()) {
            return $response;
        }else{
            switch($response->getHttpCode()) {
                default:
                    throw new UnknownResponseException($response->getHttpCode());

                case 403: throw new ForbiddenException($response->getHttpCode());
                case 429: throw new RateLimitExceedException($response->getHttpCode());
            }
        }
    }

    /**
     * Returns Lol API Handler
     * @return HandlerInterface
     */
    protected function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }

    /**
     * Returns request
     * @return Request
     */
    protected function getRequest()
    {
        return $this->request;
    }
}