<?php
namespace LolAPIExamples\League;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeFactory;
use LolAPI\GameConstants\LeagueQueueType\UnknownLQTypePolicy\ThrowsOutOfBoundsExceptionPolicy;
use LolAPI\GameConstants\LeagueTier\LeagueTierFactory;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\League\Ver2_5\BySummonerIds\DTO\SummonerDTOs;
use LolAPI\Service\League\Ver2_5\BySummonerIds\DTOBuilder;
use LolAPI\Service\League\Ver2_5\BySummonerIds\Request;
use LolAPI\Service\League\Ver2_5\BySummonerIds\Service;
use LolAPI\Service\League\Ver2_5\Component\LeagueDTOBuilder;
use LolAPIExamples\ExampleTest;

class BySummonerIdsTest extends ExampleTest
{
    public function testExample()
    {
        $config = $this->getConfig();
        $service = new Service($this->getLolAPIHandler());
        $request = new Request(
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

    private function buildDTO(ResponseInterface $response)
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