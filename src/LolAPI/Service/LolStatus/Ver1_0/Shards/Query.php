<?php
namespace LolAPI\Service\LolStatus\Ver1_0\Shards;

use LolAPI\Handler\HandlerInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Exceptions\ForbiddenException;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\UnknownResponseException;
use LolAPI\Service\LolStatus\Ver1_0\Shards\QueryResult\Shard;

class Query
{
    const QUERY_TYPE = "lol-status-ver1.0-shards";

    /**
     * Lol API Handler
     * @var HandlerInterface
     */
    private $lolAPIHandler;

    /**
     * LolStatus.shards query
     * @param HandlerInterface $lolAPIHandler
     */
    public function __construct(HandlerInterface $lolAPIHandler)
    {
        $this->lolAPIHandler = $lolAPIHandler;
    }

    /**
     * @return HandlerInterface
     */
    private function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }

    /**
     * Execute query
     * @return QueryResult
     * @throws LolAPIException
     */
    public function execute()
    {
        $response = $this->getLolAPIHandler()->exec(self::QUERY_TYPE, "http://status.leagueoflegends.com/shards", array());

        if($response->isSuccessful()) {
            return $this->createQueryResult($response);
        }else{
            switch($response->getHttpCode()) {
                default:
                    throw new UnknownResponseException($response->getHttpCode());

                case 403: throw new ForbiddenException($response->getHttpCode());
                case 429: throw new RateLimitExceedException($response->getHttpCode());
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
        $jsonResponse = $response->parse();
        $shards = array();

        foreach($jsonResponse as $arrShard) {
            $shards[] = new Shard(
                $arrShard['hostname'],
                $arrShard['locales'],
                $arrShard['name'],
                $arrShard['region_tag'],
                $arrShard['slug']
            );
        }

        return new QueryResult($response, $shards);
    }
}