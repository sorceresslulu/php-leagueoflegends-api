<?php
use LolAPI\Service\Summoner\Ver1_4\Name\DTOBuilder;

$testFunc = function()
{
    $config = getConfig();
    $apiKey = new \LolAPI\APIKey($config['apiKey']);
    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\Summoner\Ver1_4\Name\Service($apiHandler);
    $request = new \LolAPI\Service\Summoner\Ver1_4\Name\Request(
        $apiKey, $regionEndpoint, array($config['summonerId'])
    );

    $query = $service->createQuery($request);
    $response = $query->execute();

    $dtoBuilder = new DTOBuilder();
    $dto = $dtoBuilder->buildDTO($response);

    $processQueryResult = function(\LolAPI\Service\Summoner\Ver1_4\Name\DTO\NameDTO $dto)
    {
        foreach ($dto->getSummonerDTOs() as $summonerDTO) {
            println("Summoner DTO:");
            println("ID: " . $summonerDTO->getSummonerId(), 1);
            println("Name: " . $summonerDTO->getSummonerName(), 1);
        }
    };

    $processQueryResult($dto);
};

if (!count(debug_backtrace())) {
    require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

    $testFunc();
}else{
    return $testFunc;
}