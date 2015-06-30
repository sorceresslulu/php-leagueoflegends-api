<?php
namespace LolAPI\Service\League\Ver2_5\BySummonerIdsEntry;

use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\League\Ver2_5\BySummonerIdsEntry\DTO\SummonerDTO;
use LolAPI\Service\League\Ver2_5\BySummonerIdsEntry\DTO\SummonerDTOs;
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
     * @param ResponseInterface $response
     * @return SummonerDTOs
     * @throws \Exception
     */
    public function buildDTO(ResponseInterface $response)
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
     * Returns leagueDTO builder
     * @return LeagueDTOBuilder
     */
    public function getLeagueDTOBuilder()
    {
        return $this->leagueDTOBuilder;
    }
}