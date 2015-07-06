<?php
namespace LolAPIExamples\Stats;

use LolAPI\GameConstants\PlayerStatSummaryType\PlayerStatSummaryTypeFactory;
use LolAPI\GameConstants\PlayerStatSummaryType\UnknownPSSPolicyInterface\ThrowOutOfBoundsExceptionPolicy;
use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\Stats\Ver1_3\Summary\DTOBuilder;
use LolAPI\Service\Stats\Ver1_3\Summary\Request;
use LolAPI\Service\Stats\Ver1_3\Summary\Service;
use LolAPIExamples\ExampleTest;

class SummaryTest extends ExampleTest
{
    public function testExample()
    {
        $config = $this->getConfig();
        $service = new Service($this->getLolAPIHandler());

        $request = new Request($this->getApiKey(), $this->getRegionalEndpoint(), $config['summonerId']);
        $query = $service->createQuery($request);
        $response = $query->execute();

        if($this->isOutputEnabled()) {
            $this->processResult($this->buildDTO($response));
        }
    }

    private function buildDTO(LolAPIResponseInterface $response)
    {
        $playerStatSummaryTypeFactory = new PlayerStatSummaryTypeFactory(
            new ThrowOutOfBoundsExceptionPolicy()
        );

        $dtoBuilder = new DTOBuilder($playerStatSummaryTypeFactory);

        return $dtoBuilder->buildDTO($response);
    }

    private function processResult(\LolAPI\Service\Stats\Ver1_3\Summary\DTO\PlayerStatsSummaryListDto $dto)
    {
        println(sprintf("SummonerID: %s", $dto->getSummonerId()));

        foreach ($dto->getPlayerStatSummaries() as $playerStatSummary) {
            println(sprintf("Type: %s", $playerStatSummary->getPlayerStatSummaryType()->getStringCode()), 1);
            println(sprintf("TypeDescription: %s", $playerStatSummary->getPlayerStatSummaryType()->getDescription()), 1);

            if ($playerStatSummary->isLossesSpecified()) {
                println(sprintf("Losses: %s", $playerStatSummary->getLosses()), 1);
            }

            println(sprintf("Wins: %s", $playerStatSummary->getWins()), 1);
            println(sprintf("Modify Date: %s", $playerStatSummary->getModifyDate()), 1);
            println("Stats:", 1);

            foreach ($playerStatSummary->getAggregatedStats()->getAggregatedStats() as $statName => $statValue) {
                println(sprintf("%s: %s", $statName, $statValue), 2);
            }

            println("----", 1);
        }
    }
}