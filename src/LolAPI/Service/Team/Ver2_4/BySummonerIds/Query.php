<?php
namespace LolAPI\Service\Team\Ver2_4\BySummonerIds;

use LolAPI\Exceptions\BadRequestException;
use LolAPI\Exceptions\InternalServerException;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\ServiceUnavailableException;
use LolAPI\Exceptions\TeamNotFoundException;
use LolAPI\Exceptions\UnauthorizedException;
use LolAPI\Exceptions\UnknownResponseException;
use LolAPI\Handler\LolAPIHandlerInterface;
use LolAPI\Handler\LolAPIResponseInterface;

class Query
{
    const QUERY_TYPE = 'team-ver2.4-by-summoner-ids';

    /**
     * Lol API Handler
     * @var LolAPIHandlerInterface
     */
    private $lolAPIHandler;

    /**
     * Request
     * @var Request
     */
    private $request;

    /**
     * Team.BySummonerIdsIds
     * @param LolAPIHandlerInterface $lolAPIHandler
     * @param Request $request
     */
    public function __construct(LolAPIHandlerInterface $lolAPIHandler, Request $request)
    {
        $this->lolAPIHandler = $lolAPIHandler;
        $this->request = $request;
    }

    /**
     * Execute query
     * @return LolAPIResponseInterface
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
                'https://%s/api/lol/%s/v2.4/team/by-summoner/%s',
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
                case 404: throw new TeamNotFoundException($response->getHttpCode());
                case 429: throw new RateLimitExceedException($response->getHttpCode());
                case 500: throw new InternalServerException($response->getHttpCode());
                case 503: throw new ServiceUnavailableException($response->getHttpCode());
            }
        }
    }

    /**
     * Returns Lol API Handler
     * @return LolAPIHandlerInterface
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