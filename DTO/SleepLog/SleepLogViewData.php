<?php

namespace DTO\SleepLog;


use DTO\ErrorViewDataInterface;

class SleepLogViewData implements ErrorViewDataInterface
{

    private const HOUR_FORMAT = 'H:i';

    private const DATE_FORMAT = 'Y-m-d';

    private $error;

    /**
     * @var \DateTime
     */
    private $currentDatetime;

    public function __construct(\DateTime $dateTime, $error = null)
    {
        $this->currentDatetime = $dateTime;
        $this->error = $error;
    }

    public function getCurrentHour(): string
    {
        return $this->currentDatetime->format(self::HOUR_FORMAT);
    }

    public function getCurrentDate(): string
    {
        return $this->currentDatetime->format(self::DATE_FORMAT);
    }

    public function getError()
    {
        return $this->error;
    }
}