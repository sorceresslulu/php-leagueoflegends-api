<?php
namespace LolAPI\Exceptions;

class LolAPIException extends \Exception {
    public function __construct($code) {
        $this->code = $code;
    }
}