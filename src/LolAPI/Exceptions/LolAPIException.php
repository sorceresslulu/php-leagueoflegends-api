<?php
namespace LolAPI\Exceptions;

use LolAPI\Handler\LolAPIParseException;
use LolAPI\Handler\LolAPIResponseInterface;

class LolAPIException extends \Exception
{
    const CODE_STRANGE_FORMAT = 2;
    const CODE_NO_CODE_REPRESENTED = 3;

    /**
     * Generic LolAPI Exception
     * @param LolAPIResponseInterface $response
     */
    public function __construct(LolAPIResponseInterface $response)
    {
        try {
            $parsedResponse = $response->parse();

            if(isset($parsedResponse['status'])) {
                $code = isset($parsedResponse['status']['status_code'])
                    ? (int) $parsedResponse['status']['status_code']
                    : self::CODE_NO_CODE_REPRESENTED;
                $message = isset($parsedResponse['status']['message'])
                    ? $parsedResponse['status']['message']
                    : "message is not available";
            }else{
                /**
                 * Developer Note: tyvm RITO. Some services returns 404 error in HTML format.
                 */
                $code = self::CODE_STRANGE_FORMAT;
                $message = "Unknown response: response can be parsed but response has strange format";
            }
        }catch(LolAPIParseException $parseException){
            $code = $response->getHttpCode();
            $message = "Unknown response: failed to parse response";
        }

        $this->code = $code;
        $this->message = $message;
    }
}