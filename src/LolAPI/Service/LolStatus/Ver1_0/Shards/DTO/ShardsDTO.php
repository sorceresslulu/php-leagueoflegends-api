<?php
namespace LolAPI\Service\LolStatus\Ver1_0\Shards\DTO;

use LolAPI\Service\LolStatus\Ver1_0\Shards\DTO\ShardDTO;

class ShardsDTO
{
    /**
     * Shard DTOs
     * @var ShardDTO[]
     */
    private $shardDTOs = array();

    /**
     * Shard DTOs
     * @param ShardDTO[] $shardDTOs
     */
    public function __construct(array $shardDTOs)
    {
        $this->shardDTOs = $shardDTOs;
    }

    /**
     * Returns shard DTOs
     * @return ShardDTO[]
     */
    public function getShardDTOs()
    {
        return $this->shardDTOs;
    }
}