<?php
$testFunc = function() {
    $config = getConfig();
    $apiKey = new \LolAPI\APIKey($config['apiKey']);
    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\MatchHistory\Ver2_2\BySummonerId\Service($apiHandler);

    $request = new LolAPI\Service\MatchHistory\Ver2_2\BySummonerId\Request($apiKey, $regionEndpoint, $config['summonerId']);
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