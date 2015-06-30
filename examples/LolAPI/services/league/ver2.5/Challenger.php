<?php
use LolAPI\Service\League\Ver2_5\Challenger\DTOBuilder;

$testFunc = function()
{
    $config = getConfig();
    $apiKey = new \LolAPI\APIKey($config['apiKey']);
    $regionEndpointsFactory = new \LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory();
    $regionEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);

    $leagueQueueTypeFactory = new \LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeFactory(
        new LolAPI\GameConstants\LeagueQueueType\UnknownLQTypePolicy\ThrowsOutOfBoundsExceptionPolicy()
    );

    $leagueTierFactory = new \LolAPI\GameConstants\LeagueTier\LeagueTierFactory(
        new LolAPI\GameConstants\LeagueTier\UnknownTierPolicy\ThrowsOutOfBoundsExceptionPolicy()
    );

    $processQueryResult = function(\LolAPI\Service\League\Ver2_5\Challenger\DTO\ChallengerDTO $queryResult)
    {
        if ($queryResult->getLeagueQueueType()->forSolo()) {
            printLeaguePlayerDTO($queryResult->getChallengerLeaguePlayersDTO());
        } else {
            printLeagueTeamDTO($queryResult->getChallengerLeagueTeamsDTO());
        }
    };

    $apiHandler = new LolAPI\Handler\CURL\Handler();
    $service = new LolAPI\Service\League\Ver2_5\Challenger\Service($apiHandler);

    $request = new LolAPI\Service\League\Ver2_5\Challenger\Request(
        $apiKey,
        $regionEndpoint,
        $leagueQueueTypeFactory->createLQTypeByStringCode(\LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface::LQT_RANKED_SOLO_5x5)
    );

    $query = $service->createQuery($request);
    $response = $query->execute();

    $dtoBuilder = new DTOBuilder(new \LolAPI\Service\League\Ver2_5\Component\LeagueDTOBuilder(
        $leagueQueueTypeFactory,
        $leagueTierFactory
    ));

    $dto = $dtoBuilder->buildDTO($response);

    $processQueryResult($dto);

    $request = new LolAPI\Service\League\Ver2_5\Challenger\Request(
        $apiKey,
        $regionEndpoint,
        $leagueQueueTypeFactory->createLQTypeByStringCode(\LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface::LQT_RANKED_TEAM_3x3)
    );

    $query = $service->createQuery($request);
    $response = $query->execute();

    $dtoBuilder = new DTOBuilder(new \LolAPI\Service\League\Ver2_5\Component\LeagueDTOBuilder(
        $leagueQueueTypeFactory,
        $leagueTierFactory
    ));

    $dto = $dtoBuilder->buildDTO($response);

    $processQueryResult($dto);
};

if (!count(debug_backtrace())) {
    require_once __DIR__ . '/../../../bootstrap/bootstrap.php';

    $testFunc();
}else{
    return $testFunc;
}