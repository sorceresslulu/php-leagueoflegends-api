<?php
namespace LolAPI\Service\Champion\Ver1_2\Champion;

use LolAPI\Handler\HandlerInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Champion\Ver1_2\ChampionList\QueryResult\ChampionDTO;
use LolAPI\Service\Exceptions\BadRequestException;
use LolAPI\Service\Exceptions\ChampionNotFoundException;
use LolAPI\Service\Exceptions\InternalServerException;
use LolAPI\Service\Exceptions\RateLimitExceedException;
use LolAPI\Service\Exceptions\ServiceUnavailableException;
use LolAPI\Service\Exceptions\UnauthorizedException;
use LolAPI\Service\Exceptions\UnknownResponseException;

class Query
{
    /**
     * @var HandlerInterface
     */
    private $handler;

    /**
     * @var Request
     */
    private $request;

    public function __construct(HandlerInterface $handler, Request $request) {
        $this->handler = $handler;
        $this->request = $request;
    }

    /**
     * @return HandlerInterface
     */
    private function getHandler()
    {
        return $this->handler;
    }

    /**
     * @return Request
     */
    private function getRequest()
    {
        return $this->request;
    }

    public function execute()
    {
        $request = $this->getRequest();

        $urlParams = array(
            'api_key' => $request->getApiKey()->toParam(),
            'id' => $request->getChampionId()
        );

        $serviceUrl = sprintf(
            'https://%s.api.pvp.net/api/lol/%s/v1.2/champion/%d',
            rawurlencode($request->getRegion()->getDomain()),
            rawurlencode($request->getRegion()->getDirectory()),
            rawurlencode($request->getChampionId())
        );

        $response = $this->getHandler()->exec($serviceUrl, $urlParams);

        if($response->isSuccessful()) {
            return $this->createQueryResult($response);
        }else{
            switch($response->getHttpCode()) {
                default:
                    throw new UnknownResponseException($response->getHttpCode());

                case 400: throw new BadRequestException($response->getHttpCode());
                case 401: throw new UnauthorizedException($response->getHttpCode());
                case 404: throw new ChampionNotFoundException($response->getHttpCode());
                case 429: throw new RateLimitExceedException($response->getHttpCode());
                case 500: throw new InternalServerException($response->getHttpCode());
                case 503: throw new ServiceUnavailableException($response->getHttpCode());
            }
        }
    }

    private function createQueryResult(ResponseInterface $response) {
        $jsonResponse = $response->parseJSON();

        return new QueryResult($response, new ChampionDTO(
            (int) $jsonResponse['id'],
            (bool) $jsonResponse['active'],
            (bool) $jsonResponse['botEnabled'],
            (bool) $jsonResponse['botMmEnabled'],
            (bool) $jsonResponse['freeToPlay'],
            (bool) $jsonResponse['rankedPlayEnabled']
        ));
    }
}