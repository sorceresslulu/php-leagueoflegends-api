<?php
namespace LolAPI\Service\LolStatus\Ver1_0\Shards;

use LolAPI\Exceptions\ForbiddenException;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\UnknownResponseException;
use LolAPI\Handler\LolAPIHandlerInterface;
use LolAPI\Handler\LolAPIResponseInterface;

class Query
{
    const QUERY_TYPE = "lol-status-ver1.0-shards";

    /**
     * Lol API Handler
     * @var LolAPIHandlerInterface
     */
    private $lolAPIHandler;

    /**
     * LolStatus.shards query
     * @param LolAPIHandlerInterface $lolAPIHandler
     */
    public function __construct(LolAPIHandlerInterface $lolAPIHandler)
    {
        $this->lolAPIHandler = $lolAPIHandler;
    }

    /**
     * @return LolAPIHandlerInterface
     */
    private function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }

    /**
     * Execute query
     * @return LolAPIResponseInterface
     * @throws LolAPIException
     */
    public function execute()
    {
        $response = $this->getLolAPIHandler()->exec(self::QUERY_TYPE, "http://status.leagueoflegends.com/shards", array());

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