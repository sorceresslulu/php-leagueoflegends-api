<?php
use LolAPI\Service\Champion\Ver1_2\ChampionList\DTOBuilder;

$testFunc = function() {
    $config = getConfig();
    $apiKey = new \LolAPI\APIKey($config['apiKey']);
    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\Champion\Ver1_2\ChampionList\Service($apiHandler);
    $request = new LolAPI\Service\Champion\Ver1_2\ChampionList\Request($apiKey, $regionEndpoint, true);

    $query = $service->createQuery($request);
    $response = $query->execute();

    $dtoBuilder = new DTOBuilder();
    $dto = $dtoBuilder->buildDTO($response);

    $processRequest = function(\LolAPI\Service\Champion\Ver1_2\ChampionList\DTO\ChampionListDTO $championDTOs) {
        foreach($championDTOs->getChampionDTOs() as $championDTO) {
            println(sprintf("Champion #%d", $championDTO->getId()));
            println(sprintf("Active: %s", ($championDTO->isActive() ? 'true' : 'false')), 1);
            println(sprintf("BotEnabled: %s", ($championDTO->isBotEnabled() ? 'true' : 'false')), 1);
            println(sprintf("BotMmEnabled: %s", ($championDTO->isBotMmEnabled() ? 'true' : 'false')), 1);
            println(sprintf("FreeToPlay: %s", ($championDTO->isFreeToPlay() ? 'true' : 'false')), 1);
            println(sprintf("RankedPlayEnabled: %s", ($championDTO->isRankedPlayEnabled() ? 'true' : 'false')), 1);
        }
    };

    $processRequest($dto);
};

if (!count(debug_backtrace())) {
    require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

    $testFunc();
}else{
    return $testFunc;
}