<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Severity\Severities;

use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Severity\SeverityInterface;

class Unknown implements SeverityInterface
{
    /**
     * Code
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
}