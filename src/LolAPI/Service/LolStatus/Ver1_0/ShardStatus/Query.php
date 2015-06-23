<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus;

use LolAPI\Handler\HandlerInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Service as QueryResultService;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Incident;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Message;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Severity\SeverityFactory;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\ShardStatus;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Status\StatusFactory;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Translation;
use LolAPI\Exceptions\LolAPIException;
use LolAPI\Exceptions\RateLimitExceedException;
use LolAPI\Exceptions\UnknownResponseException;
use LolAPI\Exceptions\ForbiddenException;

class Query
{
    const QUERY_TYPE = "lol-status-ver1.0-shard-status";

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
     * LolStatus.Shard query
     * @param HandlerInterface $lolAPIHandler
     * @param Request $request
     */
    public function __construct(HandlerInterface $lolAPIHandler, Request $request)
    {
        $this->lolAPIHandler = $lolAPIHandler;
        $this->request = $request;
    }

    /**
     * Returns Lol API Handler
     * @return HandlerInterface
     */
    private function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }

    /**
     * Returns request
     * @return Request
     */
    private function getRequest()
    {
        return $this->request;
    }

    /**
     * Execute query
     * @return QueryResult
     * @throws LolAPIException
     */
    public function execute()
    {
        $request = $this->getRequest();

        $serviceUrl = sprintf(
            'http://status.leagueoflegends.com/shards/%s',
            rawurlencode(strtolower($request->getRegion()->getCode()))
        );

        $response = $this->getLolAPIHandler()->exec(self::QUERY_TYPE, $serviceUrl, array());

        if($response->isSuccessful()) {
            return $this->createQueryResult($response);
        }else{
            switch($response->getHttpCode()) {
                default:
                    throw new UnknownResponseException($response->getHttpCode());

                case 403: throw new ForbiddenException($response->getHttpCode());
                case 429: throw new RateLimitExceedException($response->getHttpCode());
            }
        }
    }

    /**
     * Builds and returns QueryResult object
     * @param ResponseInterface $response
     * @return QueryResult
     * @throws \Exception
     */
    public function createQueryResult(ResponseInterface $response)
    {
        $jsonResponse = $response->parseJSON();
        $services = array();

        foreach($jsonResponse['services'] as $arrService) {
          $incidents = array();

          if(isset($arrService['incidents'])) {
            foreach($arrService['incidents'] as $arrIncident) {
              $updates = array();

              if(isset($arrIncident['updates'])) {
                foreach($arrIncident['updates'] as $arrUpdate) {
                  $translations = array();

                  if(isset($arrUpdate['translations'])) {
                    foreach($arrUpdate['translations'] as $arrTranslation) {
                      $translations[] = new Translation(
                        $arrTranslation['content'],
                        $arrTranslation['locale'],
                        $arrTranslation['updated_at']
                      );
                    }
                  }

                  $updates[] = new Message(
                    (int) $arrUpdate['id'],
                    $arrUpdate['author'],
                    $arrUpdate['content'],
                    $arrUpdate['created_at'],
                    SeverityFactory::createFromStringCode($arrUpdate['severity']),
                    $translations,
                    $arrUpdate['updated_at']
                  );
                }
              }

              $incidents[] = new Incident(
                (int) $arrIncident['id'],
                (bool) $arrIncident['active'],
                $arrIncident['created_at'],
                $updates
              );
            }
          }

          $services[] = new QueryResultService(
            $arrService['name'],
            $arrService['slug'],
            StatusFactory::createFromStringCode($arrService['status']),
            $incidents
          );
        }

        $shardStatus = new ShardStatus(
          $jsonResponse['name'],
          $jsonResponse['hostname'],
          $jsonResponse['locales'],
          $jsonResponse['region_tag'],
          $services,
          $jsonResponse['slug']
        );

        return new QueryResult($response, $shardStatus);
    }
}