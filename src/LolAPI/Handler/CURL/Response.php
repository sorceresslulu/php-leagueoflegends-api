<?php
namespace LolAPI\Handler\CURL;

use LolAPI\Handler\ResponseInterface;

class Response implements ResponseInterface
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
    function __construct($httpCode, $response)
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
     * Returns true if HTTP code equals to 200
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->getHttpCode() === 200;
    }
}