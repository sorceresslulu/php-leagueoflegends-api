<?php
namespace LolAPIExamples\LolStaticData;

use LolAPI\Service\LolStaticData\Ver1_2\Realm\DTO\RealmDTO;
use LolAPI\Service\LolStaticData\Ver1_2\Realm\DTOBuilder;
use LolAPI\Service\LolStaticData\Ver1_2\Realm\Request;
use LolAPI\Service\LolStaticData\Ver1_2\Realm\Service;
use LolAPIExamples\ExampleTest;

class RealmTest extends ExampleTest
{
    public function testExample()
    {
        $service = new Service($this->getLolAPIHandler());

        $request = new Request($this->getApiKey(), $this->getRegionalEndpoint());
        $query = $service->createQuery($request);
        $response = $query->execute();

        if($this->isOutputEnabled()) {
            $dtoBuilder = new DTOBuilder();
            $this->processResult($dtoBuilder->buildDTO($response));
        }
    }

    private function processResult(RealmDTO $realmDTO)
    {
        println("Realm DTO");
        println(sprintf("CDNUrl: %s", $realmDTO->getCdnUrl()), 1);
        println(sprintf("DefaultLanguage: %s", $realmDTO->getDefaultLanguage()), 1);
        println(sprintf("DmCssFile: %s", $realmDTO->getDmCssFile()), 1);
        println(sprintf("DmLastChangedVersion: %s", $realmDTO->getDmLastChangedVersion()), 1);
        println(sprintf("IE6: %s", $realmDTO->getLegacyScriptModeForIE6()), 1);
        println(sprintf("ProfileIconMax: %s", $realmDTO->getProfileIconMax()), 1);
        println(sprintf("Store: %s", $realmDTO->getStore()), 1);
        println(sprintf("Version: %s", $realmDTO->getVersion()), 1);
        println("Versions", 1);

        foreach($realmDTO->getLastChangedVersions() as $service => $version) {
            println(sprintf("%s: %s", $service, $version), 2);
        }
    }
}