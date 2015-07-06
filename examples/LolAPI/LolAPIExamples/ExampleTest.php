<?php
namespace LolAPIExamples;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointFactory;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;
use LolAPI\Handler\CURL\CURLLolAPILolAPIHandler;
use LolAPI\Handler\LolAPIHandlerInterface;

abstract class ExampleTest implements TestInterface
{
    /**
     * If enabled test should output something
     * @var bool
     */
    private $outputEnabled;

    /**
     * Configuration
     * @var array
     */
    private $config;

    /**
     * API Key
     * @var APIKey
     */
    private $apiKey;

    /**
     * Regional endpoint
     * @var RegionalEndpointInterface
     */
    private $regionalEndpoint;

    /**
     * Lol API Handler
     * @var LolAPIHandlerInterface
     */
    private $lolAPIHandler;

    /**
     * Example
     * @param bool $enableOutput
     */
    public function __construct($enableOutput = true)
    {
        $regionEndpointsFactory = new RegionalEndpointFactory();
        $config = include __DIR__ . '/../bootstrap/config.php';

        $this->config = $config;
        $this->apiKey = new APIKey($config['apiKey']);
        $this->regionalEndpoint = $regionEndpointsFactory->createFromPlatformId($config['platformId']);
        $this->outputEnabled = $enableOutput;
        $this->lolAPIHandler = new CURLLolAPILolAPIHandler();
    }

    /**
     * Returns true if output is enabled
     * @return boolean
     */
    public function isOutputEnabled()
    {
        return $this->outputEnabled;
    }

    /**
     * Enable output
     */
    public function enableOutput()
    {
        $this->outputEnabled = true;
    }

    /**
     * Disable output
     */
    public function disableOutput()
    {
        $this->outputEnabled = false;
    }


    /**
     * Returns config
     * @return array
     */
    protected function getConfig()
    {
        return $this->config;
    }

    /**
     * Returns API Key
     * @return APIKey
     */
    protected function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Returns regional endpoint
     * @return RegionalEndpointInterface
     */
    protected function getRegionalEndpoint()
    {
        return $this->regionalEndpoint;
    }

    /**
     * Returns Lol API Handler
     * @return LolAPIHandlerInterface
     */
    protected function getLolAPIHandler()
    {
        return $this->lolAPIHandler;
    }
}