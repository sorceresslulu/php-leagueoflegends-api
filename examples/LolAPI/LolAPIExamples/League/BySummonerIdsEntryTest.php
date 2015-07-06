<?php
namespace LolAPIExamples\League;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeFactory;
use LolAPI\GameConstants\LeagueQueueType\UnknownLQTypePolicy\ThrowsOutOfBoundsExceptionPolicy;
use LolAPI\GameConstants\LeagueTier\LeagueTierFactory;
use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\League\Ver2_5\BySummonerIdsEntry\DTO\SummonerDTOs;
use LolAPI\Service\League\Ver2_5\BySummonerIdsEntry\DTOBuilder;
use LolAPI\Service\League\Ver2_5\BySummonerIdsEntry\Service;
use LolAPI\Service\League\Ver2_5\Component\LeagueDTOBuilder;
use LolAPIExamples\ExampleTest;

class BySummonerIdsEntryTest extends ExampleTest
{
    public function testExample()
    {
        $config = $this->getConfig();
        $service = new Service($this->getLolAPIHandler());

        $request = new \LolAPI\Service\League\Ver2_5\BySummonerIdsEntry\Request(
            $this->getApiKey(),
            $this->getRegionalEndpoint(),
            array($config['summonerId'], $config['summonerIdWithTeam'])
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

        $dtoBuilder = new DTOBuilder(new LeagueDTOBuilder(
            $leagueQueueTypeFactory,
            $leagueTierFactory
        ));

        return $dtoBuilder->buildDTO($response);
    }

    private function processResult(SummonerDTOs $dto)
    {
        foreach ($dto->getSummonerDTOs() as $summonerDTO) {
            println(sprintf("Summoner DTO (%d)", $summonerDTO->getSummonerId()));

            foreach ($summonerDTO->getLeaguePlayerDTOs() as $leagueDTO) {
                printLeaguePlayerDTO($leagueDTO);
            }

            foreach ($summonerDTO->getLeagueTeamDTOs() as $leagueDTO) {
                printLeagueTeamDTO($leagueDTO);
            }
        }
    }
}