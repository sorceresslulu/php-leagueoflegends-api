<?php
namespace LolAPI\Handler\CURL;

use LolAPI\Handler\LolAPIResponseInterface;

class CURLLolAPIResponse implements LolAPIResponseInterface
{
    /**
     * HTTP Code
     * @var int
     */
    private $httpCode;

    /**
     * Response
     * @var string
     */
    private $response;

    /**
     * CURL response
     * @param $httpCode
     * @param $response
     */
    public function __construct($httpCode, $response)
    {
        $this->httpCode = $httpCode;
        $this->response = $response;
    }

    /**
     * Returns HTTP code
     * @return int
     */
    public function getHttpCode()
    {
        return $this->httpCode;
    }

    /**
     * Returns response
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Returns response as array
     * @return array
     * @throws \Exception
     */
    public function parse()
    {
        $result = json_decode($this->getResponse(), true);

        if(json_last_error()) {
            throw new \Exception('Failed to parse JSON');
        }

        return $result;
    }


    /**
     * Returns true if HTTP code equals to 200
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->getHttpCode() === 200;
    }
}