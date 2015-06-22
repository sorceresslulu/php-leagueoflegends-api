<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\ShardStatus;

class QueryResult
{
    /**
     * Raw response
     * @var ResponseInterface
     */
    private $rawResponse;

    /**
     * Shard status
     * @var ShardStatus
     */
    private $shardStatus;

    /**
     * Shard status
     * @param ResponseInterface $rawResponse
     * @param ShardStatus $shardStatus
     */
    public function __construct(ResponseInterface $rawResponse, ShardStatus $shardStatus)
    {
        $this->rawResponse = $rawResponse;
        $this->shardStatus = $shardStatus;
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
     * Returns shard status
     * @return ShardStatus
     */
    public function getShardStatus()
    {
        return $this->shardStatus;
    }
}