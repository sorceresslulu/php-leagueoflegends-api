<?php
namespace LolAPIExamples\League;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeFactory;
use LolAPI\GameConstants\LeagueQueueType\UnknownLQTypePolicy\ThrowsOutOfBoundsExceptionPolicy;
use LolAPI\GameConstants\LeagueTier\LeagueTierFactory;
use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\League\Ver2_5\ByTeamIdsEntry\DTO\TeamDTOs;
use LolAPI\Service\League\Ver2_5\ByTeamIdsEntry\DTOBuilder;
use LolAPI\Service\League\Ver2_5\ByTeamIdsEntry\Request;
use LolAPI\Service\League\Ver2_5\ByTeamIdsEntry\Service;
use LolAPIExamples\ExampleTest;

class ByTeamIdsEntryTest extends ExampleTest
{
    public function testExample()
    {
        $config = $this->getConfig();
        $service = new Service(
            $this->getLolAPIHandler()
        );

        $request = new Request(
            $this->getApiKey(), $this->getRegionalEndpoint(), array($config['teamId'])
        );

        $query = $service->createQuery($request);
        $response = $query->execute();

        if($this->isOutputEnabled()) {
            $this->processResult($this->buildDTO($response));
        }
    }

    private function buildDTO(LolAPIResponseInterface $response)
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

    private function processResult(TeamDTOs $dto)
    {
        foreach ($dto->getTeamDTOs() as $teamDTO) {
            println(sprintf("Team DTO (%s)", $teamDTO->getTeamId()));

            foreach ($teamDTO->getLeagueTeamDTOs() as $leagueDTO) {
                printLeagueTeamDTO($leagueDTO);
            }
        }
    }
}