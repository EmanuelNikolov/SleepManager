<?php

namespace Services\SleepLog;


use Adapter\DatabaseInterface;
use Services\Calculator\Core\CalculatorInterface;

class SleepLogService
{


    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function logCycle(\DateTime $sleepTime, \DateTime $wakeTime, $userId)
    {
        $timeAsleep = $wakeTime->diff($sleepTime);
        $sleepCycles = floor($timeAsleep->h / CalculatorInterface::SLEEP_CYCLE);

    }
}