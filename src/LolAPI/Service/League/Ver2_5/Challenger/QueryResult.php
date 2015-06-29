<?php
namespace LolAPI\Service\League\Ver2_5\Challenger;

use LolAPI\GameConstants\LeagueQueueType\LeagueQueueTypeInterface;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\League\Ver2_5\Component\DTO\League\Player\LeaguePlayersDTO;
use LolAPI\Service\League\Ver2_5\Component\DTO\League\Team\LeagueTeamsDTO;

class QueryResult
{
    /**
     * Raw response
     * @var ResponseInterface
     */
    private $rawResponse;

    /**
     * League Queue Type
     * @var LeagueQueueTypeInterface
     */
    private $leagueQueueType;

    /**
     * LeagueDTO (players)
     * @var LeaguePlayersDTO
     */
    private $challengerLeaguePlayersDTO;

    /**
     * LeagueDTO (players)
     * @var LeagueTeamsDTO
     */
    private $challengerLeagueTeamsDTO;

    /**
     * Query Result
     * @param ResponseInterface $rawResponse
     * @param LeagueQueueTypeInterface $leagueQueueType
     * @param LeaguePlayersDTO|LeagueTeamsDTO $leagueDTO
     * @throws \Exception|\InvalidArgumentException
     */
    public function __construct(ResponseInterface $rawResponse, LeagueQueueTypeInterface $leagueQueueType, $leagueDTO)
    {
        if($leagueQueueType->forSolo()) {
            if(!($leagueDTO instanceof LeaguePlayersDTO)) {
                throw new \InvalidArgumentException("LeaguePlayersDTO expected");
            }

            $this->challengerLeaguePlayersDTO = $leagueDTO;
        }else if($leagueQueueType->forTeam()) {
            if(!($leagueDTO instanceof LeagueTeamsDTO)) {
                throw new \InvalidArgumentException("LeagueTeamsDTO expected");
            }

            $this->challengerLeagueTeamsDTO = $leagueDTO;
        }else{
            throw new \Exception("No idea what to do");
        }

        $this->rawResponse = $rawResponse;
        $this->leagueQueueType = $leagueQueueType;
    }


    /**
     * Returns raw response
     * @return ResponseInterface
     */
    public function getRawResponse()
    {
        return $this->rawResponse;
    }

    /**
     * Returns league queue type
     * @return LeagueQueueTypeInterface
     */
    public function getLeagueQueueType()
    {
        return $this->leagueQueueType;
    }

    /**
     * Returns LeagueDTO (players)
     * Throws an exception in case if you requested a team's ladder
     * @return LeaguePlayersDTO
     * @throws \Exception
     */
    public function getChallengerLeaguePlayersDTO()
    {
        if(is_null($this->challengerLeaguePlayersDTO)) {
            throw new \Exception("No challenger league players DTO available");
        }

        return $this->challengerLeaguePlayersDTO;
    }

    /**
     * Returns LeagueDTO (teams)
     * Throws an exception in case if you requested a player's ladder
     * @return LeagueTeamsDTO
     * @throws \Exception
     */
    public function getChallengerLeagueTeamsDTO()
    {
        if(is_null($this->challengerLeagueTeamsDTO)) {
            throw new \Exception("No challenger league teams DTO available");
        }

        return $this->challengerLeagueTeamsDTO;
    }
}