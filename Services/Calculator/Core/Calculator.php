<?php

namespace Services\Calculator\Core;


class Calculator implements CalculatorInterface
{

    /**
     * @var \DateTime
     */
    private $sleepTime;

    /**
     * @var \DateTime
     */
    private $wakeTime;

    private $timeAsleep;

    private $sleepCycles;

    public function __construct(\DateTime $startTime, int $sleepCycles)
    {
        $this->setSleepTime($startTime);
        $this->setSleepCycles($sleepCycles);
        $this->calculate();
    }

    public function calculate(): void
    {
        $sleepInterval =
          (CalculatorInterface::SLEEP_CYCLE * $this->sleepCycles)
          + CalculatorInterface::FALL_ASLEEP_TIME;

        $tempTime = $this->sleepTime;
        $tempTime->add(new \DateInterval("PT{$sleepInterval}M"));
        $this->setWakeTime($tempTime);
        $this->timeAsleep = $tempTime->diff($this->sleepTime);
    }

    public function getSleepTime(): \DateTime
    {
        return $this->sleepTime;
    }

    public function setSleepTime(\DateTime $time): void
    {
        $this->sleepTime = $time;
    }

    public function getWakeTime(): \DateTime
    {
        return $this->wakeTime;
    }

    public function setWakeTime(\DateTime $time): void
    {
        $this->wakeTime = $time;
    }

    public function getTimeAsleep(): \DateTime
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