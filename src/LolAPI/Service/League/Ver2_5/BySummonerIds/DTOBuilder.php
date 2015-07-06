<?php
namespace LolAPI\Service\League\Ver2_5\BySummonerIds;

use LolAPI\Handler\LolAPIResponseInterface;
use LolAPI\Service\League\Ver2_5\BySummonerIds\DTO\SummonerDTO;
use LolAPI\Service\League\Ver2_5\BySummonerIds\DTO\SummonerDTOs;
use LolAPI\Service\League\Ver2_5\Component\LeagueDTOBuilder;

class DTOBuilder
{
    /**
     * LeagueDTO builder
     * @var LeagueDTOBuilder
     */
    private $leagueDTOBuilder;

    /**
     * League.BySummonerIdsEntry DTO builder
     * @param $leagueDTOBuilder
     */
    public function __construct($leagueDTOBuilder)
    {
        $this->leagueDTOBuilder = $leagueDTOBuilder;
    }

    /**
     * Builds and returns League.BySummonerIds DTO
     * @param LolAPIResponseInterface $response
     * @return SummonerDTOs
     * @throws \Exception
     */
    public function buildDTO(LolAPIResponseInterface $response)
    {
        $parsedResponse = $response->parse();
        $summonerDTOs = array();

        foreach($parsedResponse as $summonerId => $jsonLeagues) {
            $leaguesTeam = array();
            $leaguePlayer = array();

            foreach($jsonLeagues as $jsonLeague) {
                $league = $this->getLeagueDTOBuilder()->buildLeagueDTO($jsonLeague);

                if($league->getQueue()->forSolo()) {
                    $leaguePlayer[] = $league;
                }else if($league->getQueue()->forTeam()) {
                    $leaguesTeam[] = $league;
                }
            }

            $summonerDTOs[] = new SummonerDTO(
                (int) $summonerId,
                $leaguePlayer,
                $leaguesTeam
            );
        }

        return new SummonerDTOs($summonerDTOs);
    }

    /**
     * @return LeagueDTOBuilder
     */
    public function getLeagueDTOBuilder()
    {
        return $this->leagueDTOBuilder;
    }
}