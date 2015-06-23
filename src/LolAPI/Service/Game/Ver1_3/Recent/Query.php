<?php
namespace LolAPI\Service\Game\Ver1_3\Recent;

use LolAPI\Exceptions\BadRequestException;
use LolAPI\Exceptions\GameDataNotFoundException;
use LolAPI\Exceptions\InternalServerException;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\ServiceUnavailableException;
use LolAPI\Exceptions\UnauthorizedException;
use LolAPI\Exceptions\UnknownResponseException;
use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\GameType\GameTypeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\GameConstants\SubType\SubTypeFactory;
use LolAPI\GameConstants\TeamSide\TeamSideFactory;
use LolAPI\Handler\HandlerInterface;
use LolAPI\Handler\ResponseInterface;

class Query
{
    const QUERY_TYPE = "game-ver1.3-recent";

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
     * TeamSide Factory
     * @var TeamSideFactory
     */
    private $teamSideFactory;

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
     * SubType Factory
     * @var SubTypeFactory
     */
    private $subTypeFactory;

    /**
     * MapId Factory
     * @var MapIdFactory
     */
    private $mapIdFactory;

    /**
     * Game.Recent Query
     * @param HandlerInterface $lolAPIHandler
     * @param Request $request
     * @param TeamSideFactory $teamSideFactory
     * @param GameTypeFactory $gameTypeFactory
     * @param GameModeFactory $gameModeFactory
     * @param SubTypeFactory $subTypeFactory
     * @param MapIdFactory $mapIdFactory
     */
    public function __construct(
        HandlerInterface $lolAPIHandler,
        Request $request,
        TeamSideFactory $teamSideFactory,
        GameTypeFactory $gameTypeFactory,
        GameModeFactory $gameModeFactory,
        SubTypeFactory $subTypeFactory,
        MapIdFactory $mapIdFactory
    ){
        $this->lolAPIHandler = $lolAPIHandler;
        $this->request = $request;
        $this->teamSideFactory = $teamSideFactory;
        $this->gameTypeFactory = $gameTypeFactory;
        $this->gameModeFactory = $gameModeFactory;
        $this->subTypeFactory = $subTypeFactory;
        $this->mapIdFactory = $mapIdFactory;
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
            'https://%s.api.pvp.net/api/lol/%s/v1.3/game/by-summoner/%d/recent',
            rawurlencode($request->getRegion()->getDomain()),
            rawurlencode($request->getRegion()->getDirectory()),
            rawurlencode($request->getSummonerId())
        );

        $response = $this->getLolAPIHandler()->exec(self::QUERY_TYPE, $serviceUrl, $urlParams);

        if($response->isSuccessful()) {
            return $this->createQueryResult($response);
        }else{
            switch($response->getHttpCode()) {
                default:
                    throw new UnknownResponseException($response->getHttpCode());

                case 400: throw new BadRequestException($response->getHttpCode());
                case 401: throw new UnauthorizedException($response->getHttpCode());
                case 404: throw new GameDataNotFoundException($response->getHttpCode());
                case 429: throw new RateLimitExceedException($response->getHttpCode());
                case 500: throw new InternalServerException($response->getHttpCode());
                case 503: throw new ServiceUnavailableException($response->getHttpCode());
            }
        }
    }

    /**
     * Create and returns QueryResult object
     * @param ResponseInterface $response
     * @return QueryResult
     */
    protected function createQueryResult(ResponseInterface $response)
    {
        $queryResultBuilder = new QueryResultBuilder(
            $this->getTeamSideFactory(),
            $this->getGameTypeFactory(),
            $this->getGameModeFactory(),
            $this->getSubTypeFactory(),
            $this->getMapIdFactory()
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
     * Returns TeamSide Factory
     * @return TeamSideFactory
     */
    protected function getTeamSideFactory()
    {
        return $this->teamSideFactory;
    }

    /**
     * returns GameType Factory
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

    /**
     * Returns SubType Factory
     * @return SubTypeFactory
     */
    protected function getSubTypeFactory()
    {
        return $this->subTypeFactory;
    }

    /**
     * Returns MapId Factory
     * @return MapIdFactory
     */
    protected function getMapIdFactory()
    {
        return $this->mapIdFactory;
    }
}