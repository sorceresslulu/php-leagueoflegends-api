<?php
namespace LolAPIExamples\Game;

use LolAPI\GameConstants\GameMode\GameModeFactory;
use LolAPI\GameConstants\GameType\GameTypeFactory;
use LolAPI\GameConstants\MapId\MapIdFactory;
use LolAPI\GameConstants\MapId\UnknownMapIdPolicy\ThrowOutOfBoundsExceptionPolicy;
use LolAPI\GameConstants\SubType\SubTypeFactory;
use LolAPI\GameConstants\TeamSide\TeamSideFactory;
use LolAPI\Handler\ResponseInterface;
use LolAPI\Service\Game\Ver1_3\Recent\DTO\RecentGamesDTO;
use LolAPI\Service\Game\Ver1_3\Recent\DTOBuilder;
use LolAPI\Service\Game\Ver1_3\Recent\Request;
use LolAPI\Service\Game\Ver1_3\Recent\Service;
use LolAPIExamples\ExampleTest;

class RecentTest extends ExampleTest
{
    public function testExample()
    {
        $config = $this->getConfig();
        $service = new Service($this->getLolAPIHandler());

        $request = new Request($this->getApiKey(), $this->getRegionalEndpoint(), $config['summonerId']);
        $query = $service->createQuery($request);
        $response = $query->execute();

        if($this->isOutputEnabled()) {
            $this->processRequest($this->buildDTO($response));
        }
    }

    private function buildDTO(ResponseInterface $response)
    {
        $mapIdFactory = new MapIdFactory(
            new ThrowOutOfBoundsExceptionPolicy()
        );

        $gameTypeFactory = new GameTypeFactory(
            new \LolAPI\GameConstants\GameType\UnknownGameTypePolicy\ThrowOutOfBoundsExceptionPolicy()
        );

        $gameModeFactory = new GameModeFactory(
            new \LolAPI\GameConstants\GameMode\UnknownGameModePolicy\ThrowOutOfBoundsExceptionPolicy()
        );

        $subTypesFactory = new SubTypeFactory(
            new \LolAPI\GameConstants\SubType\UnknownSubTypePolicy\ThrowOutOfBoundsExceptionPolicy()
        );

        $teamSideFactory = new TeamSideFactory(
            new \LolAPI\GameConstants\TeamSide\UnknownSidePolicy\ThrowOutOfBoundsExceptionPolicy()
        );

        $dtoBuilder = new DTOBuilder(
            $teamSideFactory,
            $gameTypeFactory,
            $gameModeFactory,
            $subTypesFactory,
            $mapIdFactory
        );

        return $dtoBuilder->buildDTO($response);
    }

    private function processRequest(RecentGamesDTO $dto)
    {
        println(sprintf("Recent games for summoner (%d)", $dto->getSummonerId()));

        foreach ($dto->getGames() as $gameDTO) {
            println(sprintf("ChampionId: %s", $gameDTO->getChampionId()), 1);
            println(sprintf("CreateDate: %s", $gameDTO->getCreateDate()), 1);
            println(sprintf("GameId: %s", $gameDTO->getGameId()), 1);
            println(sprintf("GameMode/Code: %s", $gameDTO->getGameMode()->getCode()), 1);
            println(sprintf("GameType/Code: %s", $gameDTO->getGameType()->getCode()), 1);
            println(sprintf("SubType/Code: %s", $gameDTO->getSubType()->getCode()), 1);
            println(sprintf("SubType/Description: %s", $gameDTO->getSubType()->getDescription()), 1);
            println(sprintf("MapId/Id: %s", $gameDTO->getMapId()->getId()), 1);
            println(sprintf("MapId/Name: %s", $gameDTO->getMapId()->getName()), 1);
            println(sprintf("MapId/Notes: %s", $gameDTO->getMapId()->getNotes()), 1);
            println(sprintf("Side/Id: %s", $gameDTO->getSide()->getId()), 1);
            println(sprintf("Side/Color: %s", $gameDTO->getSide()->getColor()), 1);
            println(sprintf("IsInvalid: %s", ($gameDTO->isInvalid() ? 'true' : 'false')), 1);
            println(sprintf("IpEarned : %s", $gameDTO->getIpEarned()), 1);
            println(sprintf("Level: %s", $gameDTO->getLevel()), 1);
            println(sprintf("Spell1Id: %s", $gameDTO->getSpell1()), 1);
            println(sprintf("Spell2Id: %s", $gameDTO->getSpell2()), 1);

            if ($gameDTO->hasFellowPlayers()) {
                println("Fellow Players", 1);

                foreach ($gameDTO->getFellowPlayers() as $fellowPlayer) {
                    println(sprintf("ChampionId: %d", $fellowPlayer->getChampionId()), 2);
                    println(sprintf("SummonerId: %d", $fellowPlayer->getSummonerId()), 2);
                    println(sprintf("TeamId: %d", $fellowPlayer->getTeamId()), 2);
                    println(" ", 2);
                }
            }
            println(" ", 1);
        }
    }
}