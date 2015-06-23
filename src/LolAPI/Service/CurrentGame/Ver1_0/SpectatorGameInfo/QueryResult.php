<?php
namespace LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\CurrentGame\Ver1_0\SpectatorGameInfo\QueryResult\CurrentGameInfo;

class QueryResult
{
    /**
     * Raw response
     * @var ResponseInterface
     */
    private $rawResponse;

    /**
     * Current game info
     * @var CurrentGameInfo
     */
    private $currentGameInfo;

    /**
     * Query Result
     * @param ResponseInterface $rawResponse
     * @param CurrentGameInfo $currentGameInfo
     */
    public function __construct(ResponseInterface $rawResponse, CurrentGameInfo $currentGameInfo)
    {
        $this->rawResponse = $rawResponse;
        $this->currentGameInfo = $currentGameInfo;
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
     * Returns current game info
     * @return CurrentGameInfo
     */
    public function getCurrentGameInfo()
    {
        return $this->currentGameInfo;
    }
}