<?php
namespace LolAPI\Service\Summoner\Ver1_4\Runes;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Summoner\Ver1_4\Runes\QueryResult\RunePagesDto;

class QueryResult
{
    /**
     * Raw response
     * @var ResponseInterface
     */
    private $rawResponse;

    /**
     * Rune pages DTOs
     * @var RunePagesDto[]
     */
    private $runePagesDTOs = array();

    /**
     * QueryResult
     * @param ResponseInterface $rawResponse
     * @param RunePagesDto[] $runePagesDTOs
     */
    public function __construct(ResponseInterface $rawResponse, array $runePagesDTOs)
    {
        $this->rawResponse = $rawResponse;
        $this->runePagesDTOs = $runePagesDTOs;
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
     * Returns collection of RunePagesDTO
     * @return RunePagesDto[]
     */
    public function getRunePagesDTOs()
    {
        return $this->runePagesDTOs;
    }
}

