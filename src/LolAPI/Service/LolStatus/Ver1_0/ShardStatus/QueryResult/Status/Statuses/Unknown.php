<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Status\Statuses;

use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\QueryResult\Status\StatusInterface;

class Unknown implements StatusInterface
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
     * Returns status code
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}