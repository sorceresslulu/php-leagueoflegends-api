<?php
namespace LolAPI\Service\Summoner\Ver1_4\ByNames;

class Response
{
    /**
     * @var \LolAPI\Service\Summoner\Ver1_4\ByNames\Response\SummonerDTO[]
     */
    private $summonerDTOs = array();

    /**
     * @param array $summonerDTOs
     */
    public function __construct(array $summonerDTOs) {
        foreach($summonerDTOs as $summonerStandardizedName => $summonerDTO) {
            $this->summonerDTOs[$summonerStandardizedName] = new Response\SummonerDTO(
                (int) $summonerDTO['id'],
                $summonerDTO['name'],
                (int) $summonerDTO['profileIconId'],
                (int) $summonerDTO['revisionDate'],
                (int) $summonerDTO['summonerLevel']
            );
        }
    }

    /**
     * @return \LolAPI\Service\Summoner\Ver1_4\ByNames\Response\SummonerDTO[]
     */
    public function getSummonerDTOs() {
        return $this->summonerDTOs;
    }
}

