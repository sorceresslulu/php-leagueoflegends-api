<?php
namespace LolAPI\Service\FeaturedGame\Ver1_0;

use LolAPI\Exceptions\LolAPIException;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueTypeFactory;
use LolAPI\Handler\HandlerInterface;
use LolAPI\Exceptions\ForbiddenException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\UnknownResponseException;

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
     * MatchmakingQueueType Factory
     * @var MatchmakingQueueTypeFactory
     */
    private $matchmakingQueueTypeFactory;

    /**
     * MapId Factory
     * @var MapIdFactory
     */
    private $mapIdFactory;

    /**
     * FeaturedGames query
     * @param HandlerInterface $lolAPIHandler
     * @param Request $request
     * @param MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory
     * @param MapIdFactory $mapIdFactory
     */
    public function __construct(
        HandlerInterface $lolAPIHandler,
        Request $request,
        MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory,
        MapIdFactory $mapIdFactory
    ){
        $this->lolAPIHandler = $lolAPIHandler;
        $this->request = $request;
        $this->matchmakingQueueTypeFactory = $matchmakingQueueTypeFactory;
        $this->mapIdFactory = $mapIdFactory;
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

    /**
     * Returns MatchmakingQueueType Factory
     * @return MatchmakingQueueTypeFactory
     */
    protected function getMatchmakingQueueTypeFactory()
    {
        return $this->matchmakingQueueTypeFactory;
    }

    /**
     * Returns MapId Factory
     * @return MapIdFactory
     */
    protected function getMapIdFactory()
    {
        return $this->mapIdFactory;
    }

    /**
     * Execute Query
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
            'https://%s.api.pvp.net/observer-mode/rest/featured',
            rawurlencode($request->getRegion()->getDomain()),
            rawurlencode($request->getRegion()->getDirectory())
        );

        $response = $this->getLolAPIHandler()->exec(self::QUERY_TYPE, $serviceUrl, $urlParams);

        if($response->isSuccessful()) {
            $queryResultBuilder = new QueryResultBuilder(
                $this->getMatchmakingQueueTypeFactory(),
                $this->getMapIdFactory()
            );

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