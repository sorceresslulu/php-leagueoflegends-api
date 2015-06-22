<?php
namespace LolAPI\GameConstants\PlayerStatSummaryType\Types;

use LolAPI\GameConstants\PlayerStatSummaryType\PlayerStatSummaryTypeInterface;

class Unknown implements PlayerStatSummaryTypeInterface
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
     * Returns string code
     * @return string
     */
    public function getStringCode()
    {
        return $this->code;
    }

    /**
     * Returns description (from API documentation)
     * @return string
     */
    public function getDescription()
    {
        return "Unknown";
    }
}