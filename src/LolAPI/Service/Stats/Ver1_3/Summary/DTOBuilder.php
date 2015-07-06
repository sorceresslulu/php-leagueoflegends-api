<?php
namespace LolAPI\Service\Stats\Ver1_3\Summary;

use LolAPI\GameConstants\PlayerStatSummaryType\PSSTypeFactoryInterface;
use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\Stats\Ver1_3\Summary\DTO\AggregatedStatsDto;
use LolAPI\Service\Stats\Ver1_3\Summary\DTO\PlayerStatsSummaryDto;
use LolAPI\Service\Stats\Ver1_3\Summary\DTO\PlayerStatsSummaryListDto;

class DTOBuilder
{
    /**
     * PlayerStatSummaryType Factory
     * @var PSSTypeFactoryInterface
     */
    private $playerStatSummaryTypeFactory;

    /**
     * Stats.Summary DTO builder
     * @param $playerStatSummaryTypeFactory
     */
    public function __construct($playerStatSummaryTypeFactory)
    {
        $this->playerStatSummaryTypeFactory = $playerStatSummaryTypeFactory;
    }


    /**
     * Builds and returns Stats.Summary DTO
     * @param LolAPIResponseInterface $response
     * @return PlayerStatsSummaryListDto
     */
    public function buildDTO(LolAPIResponseInterface $response)
    {
        $parsedResponse = $response->parse();
        $playerStatSummaries = array();

        foreach($parsedResponse['playerStatSummaries'] as $arrPlayerStatSummaries) {
            $playerStatSummaries[] = new PlayerStatsSummaryDto(
                $this->getPlayerStatSummaryTypeFactory()->createFromStringCode($arrPlayerStatSummaries['playerStatSummaryType']),
                new AggregatedStatsDto($arrPlayerStatSummaries['aggregatedStats']),
                isset($arrPlayerStatSummaries['losses']) ? $arrPlayerStatSummaries['losses'] : null,
                $arrPlayerStatSummaries['wins'],
                $arrPlayerStatSummaries['playerStatSummaryType']
            );
        }

        return new PlayerStatsSummaryListDto((int) $parsedResponse['summonerId'], $playerStatSummaries);
    }

    /**
     * Returns PlayerStatSummaryType factory
     * @return PSSTypeFactoryInterface
     */
    protected function getPlayerStatSummaryTypeFactory()
    {
        return $this->playerStatSummaryTypeFactory;
    }
}