<?php
namespace LolAPI\Service\FeaturedGame\Ver1_0;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\FeaturedGame\Ver1_0\QueryResult\FeaturedGames;

class QueryResult
{
    /**
     * Raw response
     * @var ResponseInterface
     */
    private $rawResponse;

    /**
     * Featured games
     * @var FeaturedGames
     */
    private $featuredGames;

    /**
     * Query Result
     * @param ResponseInterface $rawResponse
     * @param $featuredGames
     */
    public function __construct(ResponseInterface $rawResponse, $featuredGames)
    {
        $this->rawResponse = $rawResponse;
        $this->featuredGames = $featuredGames;
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
     * Returns featured games
     * @return FeaturedGames
     */
    public function getFeaturedGames()
    {
        return $this->featuredGames;
    }
}