<?php
namespace LolAPI\Service\Summoner\Ver1_4\ByIds;

use LolAPI\Handler\HandlerInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Exceptions\BadRequestException;
use LolAPI\Service\Exceptions\LolAPIException;
use LolAPI\Service\Exceptions\SummonerNotFoundException;
use LolAPI\Service\Exceptions\InternalServerException;
use LolAPI\Service\Exceptions\RateLimitExceedException;
use LolAPI\Service\Exceptions\ServiceUnavailableException;
use LolAPI\Service\Exceptions\UnauthorizedException;
use LolAPI\Service\Exceptions\UnknownResponseException;

class Query
{
    const QUERY_TYPE = "summoner-ver1.4-by-ids";

    /**
     * LolAPI Handler
     * @var HandlerInterface
     */
    private $lolAPIHandler;

    /**
     * Request
     * @var Request
     */
    private $request;

    /**
     * Summoner.ByIds query
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

        $serviceUrl = sprintf(
            'https://%s.api.pvp.net/api/lol/%s/v1.4/summoner/%s',
            rawurlencode($request->getRegion()->getDomain()),
            rawurlencode($request->getRegion()->getDirectory()),
            rawurlencode(implode(',', $request->getSummonerIds()))
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
                case 404: throw new SummonerNotFoundException($response->getHttpCode());
                case 429: throw new RateLimitExceedException($response->getHttpCode());
                case 500: throw new InternalServerException($response->getHttpCode());
                case 503: throw new ServiceUnavailableException($response->getHttpCode());
            }
        }
    }

    /**
     * Builds and returns QueryResult object
     * @param ResponseInterface $rawResponse
     * @return QueryResult
     */
    private function createQueryResult(ResponseInterface $rawResponse)
    {
        $jsonResponse = $rawResponse->parseJSON();
        $summonerDTOs = array();

        foreach($jsonResponse as $summonerStandardizedName => $summonerDTO) {
            $summonerDTOs[$summonerStandardizedName] = new QueryResult\SummonerDTO(
                (int) $summonerDTO['id'],
                $summonerDTO['name'],
                (int) $summonerDTO['profileIconId'],
                (int) $summonerDTO['revisionDate'],
                (int) $summonerDTO['summonerLevel']
            );
        }

        return new QueryResult($rawResponse, $summonerDTOs);
    }
}