<?php
namespace LolAPI\Service\Champion\Ver1_2\ChampionList;

use LolAPI\Handler\HandlerInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Champion\Ver1_2\ChampionList\QueryResult\ChampionDTO;
use LolAPI\Exceptions\BadRequestException;
use LolAPI\Exceptions\ChampionNotFoundException;
use LolAPI\Exceptions\InternalServerException;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\ServiceUnavailableException;
use LolAPI\Exceptions\UnauthorizedException;
use LolAPI\Exceptions\UnknownResponseException;

class Query
{
    const QUERY_TYPE = "champion-ver1.2-champion-list";

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
     * Champion.Champions query
     * @param HandlerInterface $handler
     * @param Request $request
     */
    public function __construct(HandlerInterface $handler, Request $request) {
        $this->lolAPIHandler = $handler;
        $this->request = $request;
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
     * Execute query
     * @return QueryResult
     * @throws LolAPIException
     * @throws \Exception
     */
    public function execute()
    {
        $request = $this->getRequest();

        if($request->fetchNotFreeToPlayChampionsOnly()) {
            $urlParams = array(
                'freeToPlay' => "false"
            );
        }else if($request->fetchFreeToPlayChampionsOnly()) {
            $urlParams = array(
                'freeToPlay' => "true"
            );
        }else{
            $urlParams = array();
        }

        $urlParams['api_key'] = $request->getApiKey()->toParam();

        if($request->getRegionalEndpoint()->hasRegionCode()) {
            $serviceUrl = sprintf(
                'https://%s/api/lol/%s/v1.2/champion',
                rawurlencode($request->getRegionalEndpoint()->getHost()),
                rawurlencode(strtolower($request->getRegionalEndpoint()->getRegionCode()))
            );
        }else{
            throw new \Exception(sprintf("Query cannot be executed for regional endpoint `%s`", $request->getRegionalEndpoint()->getPlatformId()));
        }

        $response = $this->getLolAPIHandler()->exec(self::QUERY_TYPE, $serviceUrl, $urlParams);

        if($response->isSuccessful()) {
            return $this->createQueryResult($response);
        }else{
            switch($response->getHttpCode()) {
                default:
                    throw new UnknownResponseException($response->getHttpCode());

                case 400: throw new BadRequestException($response->getHttpCode());
                case 401: throw new UnauthorizedException($response->getHttpCode());
                case 404: throw new ChampionNotFoundException($response->getHttpCode());
                case 429: throw new RateLimitExceedException($response->getHttpCode());
                case 500: throw new InternalServerException($response->getHttpCode());
                case 503: throw new ServiceUnavailableException($response->getHttpCode());
            }
        }
    }

    /**
     * Builds and returns QueryResult object
     * @param ResponseInterface $response
     * @return QueryResult
     */
    private function createQueryResult(ResponseInterface $response) {
        $jsonResponse = $response->parse();
        $champions = array();

        foreach($jsonResponse['champions'] as $champion) {
            $champions[] = new ChampionDTO(
                (int) $champion['id'],
                (bool) $champion['active'],
                (bool) $champion['botEnabled'],
                (bool) $champion['botMmEnabled'],
                (bool) $champion['freeToPlay'],
                (bool) $champion['rankedPlayEnabled']
            );
        }

        return new QueryResult($response, $champions);
    }
}