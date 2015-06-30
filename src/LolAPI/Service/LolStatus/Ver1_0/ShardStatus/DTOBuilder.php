<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Incident;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Message;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Severity\SeverityFactory;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\ShardService;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\ShardStatus;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Status\StatusFactory;
use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Translation;

class DTOBuilder
{
    /**
     * Builds and returns LolStatus.ShardStatus DTO
     * @param ResponseInterface $response
     * @return ShardStatus
     */
    public function buildDTO(ResponseInterface $response)
    {
        $parsedResponse = $response->parse();
        $services = array();

        foreach($parsedResponse['services'] as $arrService) {
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

            $services[] = new ShardService(
                $arrService['name'],
                $arrService['slug'],
                StatusFactory::createFromStringCode($arrService['status']),
                $incidents
            );
        }

        $shardStatus = new ShardStatus(
            $parsedResponse['name'],
            $parsedResponse['hostname'],
            $parsedResponse['locales'],
            $parsedResponse['region_tag'],
            $services,
            $parsedResponse['slug']
        );

        return $shardStatus;
    }
}