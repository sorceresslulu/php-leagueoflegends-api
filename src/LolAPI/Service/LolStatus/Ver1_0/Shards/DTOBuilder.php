<?php
namespace LolAPI\Service\LolStatus\Ver1_0\Shards;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\LolStatus\Ver1_0\Shards\DTO\ShardDTO;
use LolAPI\Service\LolStatus\Ver1_0\Shards\DTO\ShardsDTO;

class DTOBuilder
{
    /**
     * Builds and returns LolStatus.Shards DTO
     * @param ResponseInterface $response
     * @return ShardsDTO
     */
    public function buildDTO(ResponseInterface $response)
    {
        $parsedResponse = $response->parse();
        $shards = array();

        foreach($parsedResponse as $arrShard) {
            $shards[] = new ShardDTO(
                $arrShard['hostname'],
                $arrShard['locales'],
                $arrShard['name'],
                $arrShard['region_tag'],
                $arrShard['slug']
            );
        }

        return new ShardsDTO($shards);
    }
}