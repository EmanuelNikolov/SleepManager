<?php

namespace App\Calculators;


use DateInterval;
use DateTime;

class Calculator implements CalculatorInterface
{

    /**
     * @var DateTime
     */
    private $asleepTime;

    /**
     * @var DateTime
     */
    private $wakeTime;

    private $timeAsleep;

    private $sleepCycles;

    public function __construct(DateTime $startTime, int $sleepCycles)
    {
        $this->setAsleepTime($startTime);
        $this->setSleepCycles($sleepCycles);
        $this->calculate();
    }

    public function calculate(): void
    {
        $sleepInterval =
          (CalculatorInterface::SLEEP_CYCLE * $this->sleepCycles)
          + CalculatorInterface::FALL_ASLEEP_TIME;

        $tempTime = $this->asleepTime;
        $tempTime->add(new DateInterval("PT{$sleepInterval}M"));
        $this->setWakeTime($tempTime);
        $this->timeAsleep = $tempTime->diff($this->asleepTime);
    }

    public function getAsleepTime(): DateTime
    {
        return $this->asleepTime;
    }

    public function setAsleepTime(DateTime $time): void
    {
        $this->asleepTime = $time;
    }

    public function getWakeTime(): DateTime
    {
        return $this->wakeTime;
    }

    public function setWakeTime(DateTime $time): void
    {
        $this->wakeTime = $time;
    }

    public function getTimeAsleep(): DateTime
    {
        return $this->timeAsleep;
    }

    public function getSleepCycles(): int
    {
        return $this->sleepCycles;
    }

    public function setSleepCycles(int $sleepCycles): void
    {
        if (empty($sleepCycles)) {
            $this->sleepCycles = CalculatorInterface::RECOMMENDED_SLEEP_CYCLES;
        } else {
            $this->sleepCycles = $sleepCycles;
        }
    }
}