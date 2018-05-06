<?php

namespace DTO\SleepLog;


class Log
{

    private $id;

    private $userId;

    private $start;

    private $end;

    private $timeAsleep;

    private $dreamRecord;

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function getTimeAsleep()
    {
        return $this->timeAsleep;
    }

    public function getDreamRecord()
    {
        return $this->dreamRecord;
    }

    public function getShortDreamRecord()
    {
        //TODO: substr()
    }
}