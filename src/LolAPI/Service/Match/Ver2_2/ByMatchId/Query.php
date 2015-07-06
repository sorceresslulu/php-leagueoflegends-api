<?php
namespace LolAPI\Service\Match\Ver2_2\ByMatchId;

use LolAPI\Exceptions\BadRequestException;
use LolAPI\Exceptions\InternalServerException;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Exceptions\MatchNotFoundException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\ServiceUnavailableException;
use LolAPI\Exceptions\UnauthorizedException;
use LolAPI\Exceptions\UnknownResponseException;
use LolAPI\Handler\LolAPIHandlerInterface;
use LolAPI\Handler\LolAPIResponseInterface;

class Query
{
    const QUERY_TYPE = 'match-ver2.2-by-match-id';

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
     * Match.ByMatchId request
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

        if($request->isIncludeTimeLineSpecified()) {
            $urlParams['includeTimeline'] = $request->isIncludeTimeLine() ? 'true' : 'false';
        }

        if($request->getRegionalEndpoint()->hasRegionCode()) {
            $serviceUrl = sprintf(
                'https://%s/api/lol/%s/v2.2/match/%d',
                rawurlencode($request->getRegionalEndpoint()->getHost()),
                rawurlencode(strtolower($request->getRegionalEndpoint()->getRegionCode())),
                rawurlencode($request->getMatchId())
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
                    throw new UnknownResponseException($response);

                case 400: throw new BadRequestException($response);
                case 401: throw new UnauthorizedException($response);
                case 404: throw new MatchNotFoundException($response);
                case 429: throw new RateLimitExceedException($response);
                case 500: throw new InternalServerException($response);
                case 503: throw new ServiceUnavailableException($response);
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