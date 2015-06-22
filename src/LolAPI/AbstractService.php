<?php
namespace LolAPI;

use LolAPI\Handler\Exceptions\BadRequestException;
use LolAPI\Handler\Exceptions\ChampionNotFoundException;
use LolAPI\Handler\Exceptions\InternalServerException;
use LolAPI\Handler\Exceptions\RateLimitExceedException;
use LolAPI\Handler\Exceptions\ServiceUnavailableException;
use LolAPI\Handler\Exceptions\SummonerNotFoundException;
use LolAPI\Handler\Exceptions\UnauthorizedException;
use LolAPI\Handler\Exceptions\UnknownResponseException;
use LolAPI\Handler\HandlerInterface;

abstract class AbstractService
{
    /**
     * @var HandlerInterface
     */
    private $apiHandler;

    function __construct(HandlerInterface $apiHandler)
    {
        $this->apiHandler = $apiHandler;
    }

    protected function getAPIHandler()
    {
        return $this->apiHandler;
    }

    protected function createSummonerException($errorCode)
    {
        switch($errorCode) {
            default:
                return new UnknownResponseException;

            case 400: return new BadRequestException;
            case 401: return new UnauthorizedException;
            case 404: return new SummonerNotFoundException;
            case 429: return new RateLimitExceedException;
            case 500: return new InternalServerException;
            case 503: return new ServiceUnavailableException;
        }
    }

    protected function createChampionException($errorCode)
    {
        switch($errorCode) {
            default:
                return new UnknownResponseException;

            case 400: return new BadRequestException;
            case 401: return new UnauthorizedException;
            case 404: return new ChampionNotFoundException();
            case 429: return new RateLimitExceedException;
            case 500: return new InternalServerException;
            case 503: return new ServiceUnavailableException;
        }
    }
}