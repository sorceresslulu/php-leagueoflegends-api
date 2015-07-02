<?php
$testFunc = function() {
    $config = getConfig();
    $apiKey = new \LolAPI\APIKey($config['apiKey']);
    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\Match\Ver2_2\ByMatchId\Service($apiHandler);

    $request = new LolAPI\Service\Match\Ver2_2\ByMatchId\Request($apiKey, $regionEndpoint, $config['matchId']);
    $query = $service->createQuery($request);
    $response = $query->execute();
};

if (!count(debug_backtrace())) {
    require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

    $testFunc();
}else{
    return $testFunc;
}