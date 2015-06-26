<?php
namespace LolAPI\Service\League\Ver2_5\Component\DTO\League;

class MiniSeriesDTO
{
    /**
     * Number of wins required for promotion
     * @var int
     */
    private $target;

    /**
     * String showing the current, sequential mini series progress where
     *  'W' represents a win,
     * 'L' represents a loss,
     *  and 'N' represents a game that hasn't been played yet.
     * @var string
     */
    private $progress;

    /**
     * Number of current wins in the mini series
     * @var int
     */
    private $wins;

    /**
     * Number of current losses in the mini series
     * @var int
     */
    private $losses;

    public function __construct($target, $progress, $wins, $losses)
    {
        $this->target = $target;
        $this->progress = $progress;
        $this->wins = $wins;
        $this->losses = $losses;
    }

    /**
     * Returns number of wins required for promotion
     * @return int
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Returns string showing the current, sequential mini series progress where
     *  'W' represents a win,
     * 'L' represents a loss,
     *  and 'N' represents a game that hasn't been played yet.
     * @return string
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * Returns number of current wins in the mini series
     * @return int
     */
    public function getWins()
    {
        return $this->wins;
    }

    /**
     * Returns number of current losses in the mini series
     * @return int
     */
    public function getLosses()
    {
        return $this->losses;
    }

}