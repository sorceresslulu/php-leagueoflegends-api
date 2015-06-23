<?php
namespace LolAPI\Region;

use LolAPI\Region;

class Unknown implements Region
{
    /**
     * Region code
     * @var string
     */
    private $code;

    /**
     * Special case - unknown code
     * @param string $code
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Returns code
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public function getDirectory()
    {
        return strtolower($this->getCode());
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public function getDomain()
    {
        return strtolower($this->getCode());
    }
}