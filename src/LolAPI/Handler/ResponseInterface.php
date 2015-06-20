<?php
namespace LolAPI\Handler;

interface ResponseInterface
{
    /**
     * Returns HTTP code
     * @return int
     */
    public function getHttpCode();

    /**
     * Returns response
     * @return string
     */
    public function getResponse();

    /**
     * Returns true if HTTP code equals to 200
     * @return bool
     */
    public function isSuccessful();
}