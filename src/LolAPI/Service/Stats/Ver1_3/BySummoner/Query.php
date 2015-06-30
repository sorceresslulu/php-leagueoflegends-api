<?php
namespace LolAPI\Service\Stats\Ver1_3\BySummoner;

use LolAPI\Handler\HandlerInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Exceptions\BadRequestException;
use LolAPI\Exceptions\InternalServerException;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\ServiceUnavailableException;
use LolAPI\Exceptions\StatsDataNotFoundException;
use LolAPI\Exceptions\UnauthorizedException;
use LolAPI\Exceptions\UnknownResponseException;
use LolAPI\Service\Stats\Ver1_3\BySummoner\DTO\AggregatedStatsDto;
use LolAPI\Service\Stats\Ver1_3\BySummoner\DTO\ChampionStatsDto;
use LolAPI\Service\Stats\Ver1_3\BySummoner\DTO\RankedStatsDto;

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
     * Stats.BySummoner query
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
     * @return ResponseInterface
     * @throws LolAPIException
     * @throws \Exception
     */
    public function execute()
    {
        $request = $this->getRequest();

        $urlParams = array(
            'api_key' => $request->getApiKey()->toParam()
        );

        if($request->isSeasonSpecified()) {
            $urlParams['season'] = $request->getSeason()->toParam();
        }

        if($request->getRegionalEndpoint()->hasRegionCode()) {
            $serviceUrl = sprintf(
                'https://%s/api/lol/%s/v1.3/stats/by-summoner/%d/ranked',
                rawurlencode($request->getRegionalEndpoint()->getHost()),
                rawurlencode(strtolower($request->getRegionalEndpoint()->getRegionCode())),
                rawurlencode($request->getSummonerId())
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
}