<?php
namespace LolAPI\Service\Stats\Ver1_3\Summary;

use LolAPI\GameConstants\PlayerStatSummaryType\PlayerStatSummaryTypeFactory;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Stats\Ver1_3\Summary\DTO\AggregatedStatsDto;
use LolAPI\Service\Stats\Ver1_3\Summary\DTO\PlayerStatsSummaryDto;
use LolAPI\Service\Stats\Ver1_3\Summary\DTO\PlayerStatsSummaryListDto;

class DTOBuilder
{
    /**
     * PlayerStatSummaryType Factory
     * @var PlayerStatSummaryTypeFactory
     */
    private $playerStatSummaryTypeFactory;

    /**
     * Builds and returns Stats.Summary DTO
     * @param ResponseInterface $response
     * @return PlayerStatsSummaryListDto
     */
    public function buildDTO(ResponseInterface $response)
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
     * @return PlayerStatSummaryTypeFactory
     */
    protected function getPlayerStatSummaryTypeFactory()
    {
        return $this->playerStatSummaryTypeFactory;
    }
}