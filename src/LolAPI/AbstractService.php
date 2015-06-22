<?php
namespace LolAPI {
    use LolAPI\Handler\HandlerInterface;

    abstract class AbstractService
    {
        /**
         * @var HandlerInterface
         */
        private $apiHandler;

        function __construct(HandlerInterface $apiHandler)
        {
            $this->apiHandler = $apiHandler;
        }

        protected function getAPIHandler()
        {
            return $this->apiHandler;
        }
    }
}

namespace LolAPI\Service\Exceptions {
    class LolAPIException extends \Exception {
        public function __construct($code) {
            $this->code = $code;
        }
    }

    class UnknownResponseException extends LolAPIException {}
    class BadRequestException extends LolAPIException {}
    class UnauthorizedException extends LolAPIException {}
    class SummonerNotFoundException extends LolAPIException {}
    class ChampionNotFoundException extends LolAPIException {}
    class RateLimitExceedException extends LolAPIException {}
    class InternalServerException extends LolAPIException {}
    class ServiceUnavailableException extends LolAPIException {}
    class ForbiddenException extends LolAPIException {}
}