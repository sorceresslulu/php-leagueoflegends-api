<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo;

use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\GameType\GameTypeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\GameConstants\MatchmakingQueueType\MatchmakingQueueTypeFactory;
use LolAPI\Handler\HandlerInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Exceptions\ForbiddenException;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\SpectatorGameInfoNotFoundException;
use LolAPI\Exceptions\UnauthorizedException;
use LolAPI\Exceptions\UnknownResponseException;
use LolAPI\GameConstants\Platform\PlatformFactory;

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
     * @var \LolAPI\GameConstants\Platform\PlatformFactory
     */
    private $platformFactory;

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
     * GameType Factory
     * @var GameTypeFactory
     */
    private $gameTypeFactory;

    /**
     * GameMode Factory
     * @var GameModeFactory
     */
    private $gameModeFactory;

    /**
     * CurrentGame.SpectatorGameInfo query
     * @param HandlerInterface $lolAPIHandler
     * @param Request $request
     * @param PlatformFactory $platformFactory
     * @param MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory
     * @param MapIdFactory $mapIdFactory
     */
    public function __construct(
        HandlerInterface $lolAPIHandler,
        Request $request,
        PlatformFactory $platformFactory,
        MatchmakingQueueTypeFactory $matchmakingQueueTypeFactory,
        MapIdFactory $mapIdFactory,
        GameTypeFactory $gameTypeFactory,
        GameModeFactory $gameModeFactory
    ){
        $this->lolAPIHandler = $lolAPIHandler;
        $this->request = $request;
        $this->platformFactory = $platformFactory;
        $this->matchmakingQueueTypeFactory =$matchmakingQueueTypeFactory;
        $this->mapIdFactory = $mapIdFactory;
        $this->gameTypeFactory = $gameTypeFactory;
        $this->gameModeFactory = $gameModeFactory;
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
    protected function createQueryResult(ResponseInterface $response)
    {
        $queryResultBuilder = new QueryResultBuilder(
            $this->getPlatformFactory(),
            $this->getMatchmakingQueueTypeFactory(),
            $this->getMapIdFactory(),
            $this->getGameTypeFactory(),
            $this->getGameModeFactory()
        );

        return $queryResultBuilder->build($response);
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
     * Returns platform factory
     * @return PlatformFactory
     */
    protected function getPlatformFactory()
    {
        return $this->platformFactory;
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
     * Returns GameType Factory
     * @return GameTypeFactory
     */
    protected function getGameTypeFactory()
    {
        return $this->gameTypeFactory;
    }

    /**
     * Returns GameMode Factory
     * @return GameModeFactory
     */
    protected function getGameModeFactory()
    {
        return $this->gameModeFactory;
    }
}