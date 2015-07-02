<?php
namespace LolAPI\Service\Match\Ver2_2\ByMatchId;

use LolAPI\APIKey;
use LolAPI\GameConstants\RegionalEndpoint\RegionalEndpointInterface;

class Request
{
    /**
     * API Key
     * @var APIKey
     */
    private $apiKey;

    /**
     * Region endpoint
     * @var RegionalEndpointInterface
     */
    private $regionalEndpoint;

    /**
     * The ID of the match.
     * @var int
     */
    private $matchId;

    /**
     * Flag indicating whether or not to include match timeLine data
     * @var bool|null
     */
    private $includeTimeLine;

    /**
     * Match.ByMatchId request
     * @param APIKey $apiKey
     * @param RegionalEndpointInterface $regionEndpoint
     * @param $matchId
     * @param bool $includeTimeLine
     */
    public function __construct(APIKey $apiKey, RegionalEndpointInterface $regionEndpoint, $matchId, $includeTimeLine = null)
    {
        $this->apiKey = $apiKey;
        $this->regionalEndpoint = $regionEndpoint;
        $this->matchId = $matchId;
        $this->includeTimeLine = $includeTimeLine;
    }


    /**
     * Returns API key
     * @return APIKey
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Returns region endpoint
     * @return RegionalEndpointInterface
     */
    public function getRegionalEndpoint()
    {
        return $this->regionalEndpoint;
    }

    /**
     * Returns match ID
     * @return int
     */
    public function getMatchId()
    {
        return $this->matchId;
    }

    /**
     * Returns true if includeTimeLine flag is specified
     * @return bool
     */
    public function isIncludeTimeLineSpecified()
    {
        return $this->includeTimeLine !== null;
    }

    /**
     * Returns true if include match timeLine data are requested
     * @return bool
     * @throws \Exception
     */
    public function isIncludeTimeLine()
    {
        if(!($this->isIncludeTimeLineSpecified())) {
            throw new \Exception("includeTimeLine is not specified");
        }

        return $this->includeTimeLine;
    }
}