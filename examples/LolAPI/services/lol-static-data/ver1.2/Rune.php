<?php
$testFunc = function() {
    $config = getConfig();
    $apiKey = new \LolAPI\APIKey($config['apiKey']);
    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\LolStaticData\Ver1_2\Rune\Service($apiHandler);

    $request = new LolAPI\Service\LolStaticData\Ver1_2\Rune\Request($apiKey, $regionEndpoint, $config['runeId']);
    $query = $service->createQuery($request);
    $response = $query->execute();

    var_dump($response->parse());
};

if (!count(debug_backtrace())) {
    require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

    $testFunc();
}else{
    return $testFunc;
}