<?php
namespace LolAPI;

class APIKey
{
    /**
     * API Key
     * @var string
     */
    private $key;

    /**
     * API Key
     * @param string $key
     */
    function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Returns API key for use as HTTP param
     * @return string
     */
    public function toParam()
    {
        return $this->key;
    }
}

