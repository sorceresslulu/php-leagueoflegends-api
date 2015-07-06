<?php
namespace LolAPIExamples\League;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeFactory;
use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface;
use LolAPI\GameConstants\LeagueQueueType\UnknownLQTypePolicy\ThrowsOutOfBoundsExceptionPolicy;
use LolAPI\GameConstants\LeagueTier\LeagueTierFactory;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\League\Ver2_5\Challenger\DTO\ChallengerDTO;
use LolAPI\Service\League\Ver2_5\Challenger\DTOBuilder;
use LolAPI\Service\League\Ver2_5\Challenger\Request;
use LolAPI\Service\League\Ver2_5\Challenger\Service;
use LolAPIExamples\ExampleTest;

class ChallengerTest extends ExampleTest
{
    public function testExample()
    {
        $leagueQueueTypeFactory = new LeagueQueueTypeFactory(
            new ThrowsOutOfBoundsExceptionPolicy()
        );

        $service = new Service($this->getLolAPIHandler());
        $queues = array(
            LeagueQueueTypeInterface::LQT_RANKED_SOLO_5x5,
            LeagueQueueTypeInterface::LQT_RANKED_TEAM_5x5,
            LeagueQueueTypeInterface::LQT_RANKED_TEAM_3x3
        );

        foreach($queues as $q) {
            $request = new Request(
                $this->getApiKey(),
                $this->getRegionalEndpoint(),
                $leagueQueueTypeFactory->createLQTypeByStringCode($q)
            );

            $query = $service->createQuery($request);
            $response = $query->execute();

            if($this->isOutputEnabled()) {
                $this->processResult($this->buildDTO($response));
            }
        }
    }

    private function buildDTO(ResponseInterface $response)
    {

        $leagueQueueTypeFactory = new LeagueQueueTypeFactory(
            new ThrowsOutOfBoundsExceptionPolicy()
        );

        $leagueTierFactory = new LeagueTierFactory(
            new \LolAPI\GameConstants\LeagueTier\UnknownTierPolicy\ThrowsOutOfBoundsExceptionPolicy()
        );

        $dtoBuilder = new DTOBuilder(new \LolAPI\Service\League\Ver2_5\Component\LeagueDTOBuilder(
            $leagueQueueTypeFactory,
            $leagueTierFactory
        ));

        return $dtoBuilder->buildDTO($response);
    }

    private function processResult(ChallengerDTO $queryResult)
    {
        if ($queryResult->getLeagueQueueType()->forSolo()) {
            printLeaguePlayerDTO($queryResult->getChallengerLeaguePlayersDTO());
        } else {
            printLeagueTeamDTO($queryResult->getChallengerLeagueTeamsDTO());
        }
    }
}