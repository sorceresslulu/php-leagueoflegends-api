<?php
namespace LolAPI\Handler;

interface HandlerInterface
{
    /**
     * Execute RIOT API call
     * Returns a response object
     * @param string $serviceURL Service URL
     * @param array $params Params
     * @return ResponseInterface
     */
    public function exec($serviceURL, array $params);
}

namespace LolAPI\Handler\Exceptions;

class LolAPIException extends \Exception {}

class UnknownResponseException extends LolAPIException {}
class BadRequestException extends LolAPIException {}
class UnauthorizedException extends LolAPIException {}
class SummonerNotFoundException extends LolAPIException {}
class RateLimitExceedException extends LolAPIException {}
class InternalServerException extends LolAPIException {}
class ServiceUnavailableException extends LolAPIException {}