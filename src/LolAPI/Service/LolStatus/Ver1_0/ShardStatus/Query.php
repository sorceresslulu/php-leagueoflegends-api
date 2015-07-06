<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus;

use LolAPI\Exceptions\ForbiddenException;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\UnknownResponseException;
use LolAPI\Handler\LolAPIHandlerInterface;
use LolAPI\Handler\LolAPIResponseInterface;

class Query
{
    const QUERY_TYPE = "lol-status-ver1.0-shard-status";

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
     * LolStatus.Shard query
     * @param LolAPIHandlerInterface $lolAPIHandler
     * @param Request $request
     */
    public function __construct(LolAPIHandlerInterface $lolAPIHandler, Request $request)
    {
        $this->lolAPIHandler = $lolAPIHandler;
        $this->request = $request;
    }

    /**
     * Returns Lol API Handler
     * @return LolAPIHandlerInterface
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
     * @return LolAPIResponseInterface
     * @throws LolAPIException
     * @throws \Exception
     */
    public function execute()
    {
        $request = $this->getRequest();

        if($request->getRegionalEndpoint()->hasRegionCode()) {
            $serviceUrl = sprintf(
                'http://status.leagueoflegends.com/shards/%s',
                rawurlencode(strtolower($request->getRegionalEndpoint()->getRegionCode()))
            );
        }else{
            throw new \Exception(sprintf("Query cannot be executed for regional endpoint `%s`", $request->getRegionalEndpoint()->getPlatformId()));
        }

        $response = $this->getLolAPIHandler()->exec(self::QUERY_TYPE, $serviceUrl, array());

        if($response->isSuccessful()) {
            return $response;
        }else{
            switch($response->getHttpCode()) {
                default:
                    throw new UnknownResponseException($response);

                case 403: throw new ForbiddenException($response);
                case 429: throw new RateLimitExceedException($response);
            }
        }
    }
}