<?php
namespace LolAPI\Service\Summoner\Ver1_4\ByNames;

use LolAPI\Handler\HandlerInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Exceptions\BadRequestException;
use LolAPI\Service\Exceptions\SummonerNotFoundException;
use LolAPI\Service\Exceptions\InternalServerException;
use LolAPI\Service\Exceptions\RateLimitExceedException;
use LolAPI\Service\Exceptions\ServiceUnavailableException;
use LolAPI\Service\Exceptions\UnauthorizedException;
use LolAPI\Service\Exceptions\UnknownResponseException;

class Query
{
    /**
     * Lol API Handler
     * @var HandlerInterface
     */
    private $lolAPIHandler;

    /**
     * Request
     * @var Request
     */
    private $request;

    function __construct($lolAPIHandler, $request)
    {
        $this->lolAPIHandler = $lolAPIHandler;
        $this->request = $request;
    }

    /**
     * @return HandlerInterface
     */
    private function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
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
            'api_key' => $request->getApiKey()->toParam()
        );

        $serviceUrl = sprintf(
            'https://%s.api.pvp.net/api/lol/%s/v1.4/summoner/by-name/%s',
            rawurlencode($request->getRegion()->getDomain()),
            rawurlencode($request->getRegion()->getDirectory()),
            rawurlencode(implode(',', $request->getSummonerNames()))
        );

        $response = $this->getLolAPIHandler()->exec($serviceUrl, $urlParams);

        if($response->isSuccessful()) {
            return $this->createQueryResult($response);
        }else{
            switch($response->getHttpCode()) {
                default:
                    throw new UnknownResponseException($response->getHttpCode());

                case 400: throw new BadRequestException($response->getHttpCode());
                case 401: throw new UnauthorizedException($response->getHttpCode());
                case 404: throw new SummonerNotFoundException($response->getHttpCode());
                case 429: throw new RateLimitExceedException($response->getHttpCode());
                case 500: throw new InternalServerException($response->getHttpCode());
                case 503: throw new ServiceUnavailableException($response->getHttpCode());
            }
        }
    }

    private function createQueryResult(ResponseInterface $response) {
        $jsonResponse = $response->parseJSON();
        $summonerDTOs = array();

        foreach($jsonResponse as $summonerStandardizedName => $summonerDTO) {
            $summonerDTOs[$summonerStandardizedName] = new QueryResult\SummonerDTO(
                (int) $summonerDTO['id'],
                $summonerDTO['name'],
                (int) $summonerDTO['profileIconId'],
                (int) $summonerDTO['revisionDate'],
                (int) $summonerDTO['summonerLevel']
            );
        }

        return new QueryResult($response, $summonerDTOs);
    }
}