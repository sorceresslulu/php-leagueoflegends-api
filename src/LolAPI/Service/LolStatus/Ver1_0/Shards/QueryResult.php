<?php
namespace LolAPI\Service\LolStatus\Ver1_0\Shards;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\LolStatus\Ver1_0\Shards\QueryResult\Shard;

class QueryResult
{
    /**
     * Raw response
     * @var ResponseInterface
     */
    private $rawResponse;

    /**
     * Shards
     * @var Shard[]
     */
    private $shards = array();

    /**
     * Query Result
     * @param ResponseInterface $rawResponse
     * @param Shard[] $shards
     */
    public function __construct(ResponseInterface $rawResponse, array $shards)
    {
        $this->rawResponse = $rawResponse;
        $this->shards = $shards;
    }

    /**
     * Returns raw response
     * @return ResponseInterface
     */
    public function getRawResponse()
    {
        return $this->rawResponse;
    }

    /**
     * Returns shards
     * @return QueryResult\Shard[]
     */
    public function getShards()
    {
        return $this->shards;
    }
}