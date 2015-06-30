<?php
namespace LolAPI\Service\Summoner\Ver1_4\Masteries;

use LolAPI\Handler\HandlerInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Service\Summoner\Ver1_4\Masteries\DTO\MasteryDTO;
use LolAPI\Service\Summoner\Ver1_4\Masteries\DTO\MasteryPageDTO;
use LolAPI\Service\Summoner\Ver1_4\Masteries\DTO\MasteryPagesDTO;
use LolAPI\Exceptions\BadRequestException;
use LolAPI\Exceptions\SummonerNotFoundException;
use LolAPI\Exceptions\InternalServerException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\ServiceUnavailableException;
use LolAPI\Exceptions\UnauthorizedException;
use LolAPI\Exceptions\UnknownResponseException;

class Query
{
    const QUERY_TYPE = "summoner-ver1.4-masteries";

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
     * Summoner.Masteries query
     * @param $lolAPIHandler
     * @param $request
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

        if($request->getRegionalEndpoint()->hasRegionCode()) {
            $serviceUrl = sprintf(
                'https://%s/api/lol/%s/v1.4/summoner/%s/masteries',
                rawurlencode($request->getRegionalEndpoint()->getHost()),
                rawurlencode(strtolower($request->getRegionalEndpoint()->getRegionCode())),
                rawurlencode(implode(',', $request->getSummonerIds()))
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
                case 404: throw new SummonerNotFoundException($response->getHttpCode());
                case 429: throw new RateLimitExceedException($response->getHttpCode());
                case 500: throw new InternalServerException($response->getHttpCode());
                case 503: throw new ServiceUnavailableException($response->getHttpCode());
            }
        }
    }
}