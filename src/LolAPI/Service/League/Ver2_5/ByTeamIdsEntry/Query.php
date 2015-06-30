<?php
namespace LolAPI\Service\League\Ver2_5\ByTeamIdsEntry;

use LolAPI\Exceptions\BadRequestException;
use LolAPI\Exceptions\InternalServerException;
use LolAPI\Exceptions\LeagueNotFoundException;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\ServiceUnavailableException;
use LolAPI\Exceptions\UnauthorizedException;
use LolAPI\Exceptions\UnknownResponseException;
use LolAPI\Handler\HandlerInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\League\Ver2_5\ByTeamIdsEntry\DTO\TeamDTO;
use LolAPI\Service\League\Ver2_5\Component\DTOBuilder;

class Query
{
    const QUERY_TYPE = 'league-ver2.5-by-team-ids-entry';

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

    /**
     * League DTO builder
     * @var DTOBuilder
     */
    private $DTOBuilder;

    /**
     * League.ByTeamIdsEntry query
     * @param HandlerInterface $lolAPIHandler
     * @param Request $request
     * @param DTOBuilder $DTOBuilder
     */
    public function __construct(HandlerInterface $lolAPIHandler, Request $request, DTOBuilder $DTOBuilder)
    {
        $this->lolAPIHandler = $lolAPIHandler;
        $this->request = $request;
        $this->DTOBuilder = $DTOBuilder;
    }

    /**
     * Execute query
     * @return QueryResult
     * @throws LolAPIException
     */
    public function execute()
    {
        $request = $this->getRequest();


        $urlParams = array(
            'api_key' => $request->getApiKey()->toParam()
        );

        $serviceUrl = sprintf(
            'https://%s.api.pvp.net/api/lol/%s/v2.5/league/by-team/%s/entry',
            rawurlencode($request->getRegion()->getDomain()),
            rawurlencode($request->getRegion()->getDirectory()),
            rawurlencode(implode(',', $request->getTeamIds()))
        );

        $response = $this->getLolAPIHandler()->exec(self::QUERY_TYPE, $serviceUrl, $urlParams);

        if($response->isSuccessful()) {
            return $this->createQueryResult($response);
        }else{
            switch($response->getHttpCode()) {
                default:
                    throw new UnknownResponseException($response->getHttpCode());

                case 400: throw new BadRequestException($response->getHttpCode());
                case 401: throw new UnauthorizedException($response->getHttpCode());
                case 404: throw new LeagueNotFoundException($response->getHttpCode());
                case 429: throw new RateLimitExceedException($response->getHttpCode());
                case 500: throw new InternalServerException($response->getHttpCode());
                case 503: throw new ServiceUnavailableException($response->getHttpCode());
            }
        }
    }

    /**
     * Builds and returns QueryResult object
     * @param ResponseInterface $response
     * @return QueryResult
     */
    protected function createQueryResult(ResponseInterface $response)
    {
        $jsonResponse = $response->parse();
        $teamDTOs = array();

        foreach($jsonResponse as $teamId => $jsonLeagues) {
            $leagues = array();

            foreach($jsonLeagues as $jsonLeague) {
                $leagues[] = $this->getDTOBuilder()->buildLeagueDTO($jsonLeague);
            }

            $teamDTOs[] = new TeamDTO(
                $teamId,
                $leagues
            );
        }

        return new QueryResult($response, $teamDTOs);
    }

    /**
     * Returns Lol API handler
     * @return HandlerInterface
     */
    protected function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }

    /**
     * Returns request
     * @return Request
     */
    protected function getRequest()
    {
        return $this->request;
    }

    /**
     * Returns DTO Builder
     * @return DTOBuilder
     */
    public function getDTOBuilder()
    {
        return $this->DTOBuilder;
    }
}