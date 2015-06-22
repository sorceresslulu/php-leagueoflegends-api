<?php
namespace LolAPI\Service\Stats\Ver1_3\BySummoner;

use LolAPI\Handler\HandlerInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Exceptions\BadRequestException;
use LolAPI\Service\Exceptions\InternalServerException;
use LolAPI\Service\Exceptions\LolAPIException;
use LolAPI\Service\Exceptions\RateLimitExceedException;
use LolAPI\Service\Exceptions\ServiceUnavailableException;
use LolAPI\Service\Exceptions\StatsDataNotFoundException;
use LolAPI\Service\Exceptions\UnauthorizedException;
use LolAPI\Service\Exceptions\UnknownResponseException;
use LolAPI\Service\Stats\Ver1_3\BySummoner\QueryResult\AggregatedStatsDto;
use LolAPI\Service\Stats\Ver1_3\BySummoner\QueryResult\ChampionStatsDto;
use LolAPI\Service\Stats\Ver1_3\BySummoner\QueryResult\RankedStatsDto;

class Query
{
    const QUERY_TYPE = "stats-ver1.3-by-summoner";

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
     * Request
     * @param HandlerInterface $lolAPIHandler
     * @param Request $request
     */
    public function __construct(HandlerInterface $lolAPIHandler, Request $request)
    {
        $this->lolAPIHandler = $lolAPIHandler;
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
     */
    public function execute()
    {
        $request = $this->getRequest();

        $urlParams = array(
            'api_key' => $request->getApiKey()->toParam()
        );

        if($request->isSeasonSpecified()) {
            $urlParams['season'] = $request->getSeason();
        }

        $serviceUrl = sprintf(
            'https://%s.api.pvp.net/api/lol/%s/v1.3/stats/by-summoner/%d/ranked',
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
                case 404: throw new StatsDataNotFoundException($response->getHttpCode());
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
    private function createQueryResult(ResponseInterface $response)
    {
        $jsonResponse = $response->parseJSON();
        $champions = array();

        foreach($jsonResponse['champions'] as $arrChampion) {
            $champions[] = new ChampionStatsDto(
                (int) $arrChampion['id'],
                new AggregatedStatsDto($arrChampion['stats'])
            );
        }

        $rankedStatsDTO = new RankedStatsDto(
            (int) $jsonResponse['summonerId'],
            (int) $jsonResponse['modifyDate'],
            $champions
        );

        return new QueryResult($response, $rankedStatsDTO);
    }
}