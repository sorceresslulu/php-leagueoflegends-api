<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus;

use LolAPI\Handler\HandlerInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Service as QueryResultService;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Incident;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Message;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Severity\SeverityFactory;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\ShardStatus;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Status\StatusFactory;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Translation;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\UnknownResponseException;
use LolAPI\Exceptions\ForbiddenException;

class Query
{
    const QUERY_TYPE = "lol-status-ver1.0-shard-status";

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
     * LolStatus.Shard query
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
                    throw new UnknownResponseException($response->getHttpCode());

                case 403: throw new ForbiddenException($response->getHttpCode());
                case 429: throw new RateLimitExceedException($response->getHttpCode());
            }
        }
    }
}