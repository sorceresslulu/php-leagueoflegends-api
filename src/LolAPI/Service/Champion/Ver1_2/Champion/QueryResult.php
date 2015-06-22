<?php
namespace LolAPI\Service\Champion\Ver1_2\Champion;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Champion\Ver1_2\Champion\Response\ChampionDTO;

class QueryResult
{
    /**
     * Champion DTO
     * @var ChampionDTO
     */
    private $championDTO;

    /**
     * Raw response
     * @var ResponseInterface
     */
    private $rawResponse;

    public function __construct(ResponseInterface $response, $championDTO)
    {
        $this->response = $response;
        $this->championDTO = $championDTO;
    }

    /**
     * Returns champion DTO
     * @return ChampionDTO
     */
    public function getChampionDTO()
    {
        return $this->championDTO;
    }

    /**
     * Returns raw response
     * @return ResponseInterface
     */
    public function getRawResponse()
    {
        return $this->rawResponse;
    }
}