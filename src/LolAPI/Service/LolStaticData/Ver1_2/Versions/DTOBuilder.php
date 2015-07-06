<?php
namespace LolAPI\Service\LolStaticData\Ver1_2\Versions;

use LolAPI\Handler\LolAPIResponseInterface;

class DTOBuilder
{
    /**
     * LolStaticData.Versions DTO builder
     * @param LolAPIResponseInterface $response
     * @return DTO\VersionsDTO
     */
    public function buildDTO(LolAPIResponseInterface $response)
    {
        return new DTO\VersionsDTO($response->parse());
    }
}