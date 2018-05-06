<?php

namespace DTO\SleepLog;


class LogsViewData
{

    /**
     * @var \DTO\SleepLog\Log|\Generator
     */
    private $logs = [];

    /**
     * @return \DTO\SleepLog\Log|\Generator
     */
    public function getLogs()
    {
        return $this->logs;
    }

    /**
     * @param callable $logs
     */
    public function setLogs(callable $logs)
    {
        $this->logs = $logs();
    }
}