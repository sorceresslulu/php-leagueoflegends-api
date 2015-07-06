<?php
namespace LolAPI\Handler;

interface LolAPIResponseInterface
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
     * Returns response as array
     * @return array
     */
    public function parse();

    /**
     * Returns true if HTTP code equals to 200
     * @return bool
     */
    public function isSuccessful();
}