<?php
namespace LolAPI\Service\Stats\Ver1_3\Summary;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Stats\Ver1_3\Summary\QueryResult\PlayerStatsSummaryListDto;

class QueryResult
{
    /**
     * Raw response
     * @var ResponseInterface
     */
    private $rawResponse;

    /**
     * Players stats summary list
     * @var PlayerStatsSummaryListDto
     */
    private $playerStatsSummaryListDto;

    /**
     * Raw response
     * @param ResponseInterface $rawResponse
     * @param PlayerStatsSummaryListDto $playerStatsSummaryListDto
     */
    public function __construct(ResponseInterface $rawResponse, PlayerStatsSummaryListDto $playerStatsSummaryListDto)
    {
        $this->playerStatsSummaryListDto = $playerStatsSummaryListDto;
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
     * Returns players stats summary list DTO
     * @return PlayerStatsSummaryListDto
     */
    public function getPlayerStatsSummaryListDto()
    {
        return $this->playerStatsSummaryListDto;
    }
}