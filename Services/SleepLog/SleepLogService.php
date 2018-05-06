<?php

namespace Services\SleepLog;


use Adapter\DatabaseInterface;
use DTO\SleepLog\Log;
use DTO\SleepLog\LogsViewData;
use Exceptions\LogCycleException;

class SleepLogService
{

    const SECONDS_IN_HOUR = 3600;

    const MYSQL_DATETIME_FORMAT = 'Y-m-d H:i:s';

    const MYSQL_HOUR_LIMIT = 836;

    const TEXT_LIMIT = 5000;

    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function logCycle(
      \DateTime $sleepTime,
      \DateTime $wakeTime,
      $userId,
      string $dreamRecord = null
    ) {
        if ($sleepTime > $wakeTime) {
            throw new LogCycleException("Time of going to bed must be before waking up.");
        }
        if (strlen($dreamRecord) > self::TEXT_LIMIT) {
            throw new LogCycleException("Text must be below 5000 characters");
        }
        $timeAsleepSeconds = abs(
          $sleepTime->getTimestamp() - $wakeTime->getTimestamp()
        );
        $timeAsleepHours = floor($timeAsleepSeconds / self::SECONDS_IN_HOUR);
        if ($timeAsleepHours > self::MYSQL_HOUR_LIMIT) {
            throw new LogCycleException("Difference between going to bed and waking up is too big.");
        }
        if ($timeAsleepHours < 10) {
            $timeAsleepHours = "0" . $timeAsleepHours;
        }
        $timeAsleep = $timeAsleepHours . gmdate(":i:s",
            $timeAsleepSeconds % self::SECONDS_IN_HOUR);

        $sleepTime = $sleepTime->format(self::MYSQL_DATETIME_FORMAT);
        $wakeTime = $wakeTime->format(self::MYSQL_DATETIME_FORMAT);

        $query = "INSERT INTO sleep_cycle (
                        user_id, 
                        start, 
                        end, 
                        time_asleep,
                        dream_record
                  ) VALUES (
                        ?, 
                        ?, 
                        ?, 
                        ?,
                        ?
                  )";
        $stmt = $this->db->prepare($query);
        $stmt->execute(
          [
            $userId,
            $sleepTime,
            $wakeTime,
            $timeAsleep,
            $dreamRecord,
          ]
        );
    }

    public function showLogs($userId): LogsViewData
    {
        $query = "SELECT 
                    s.id, 
                    s.start, 
                    s.end, 
                    s.time_asleep AS timeAsleep,
                    s.dream_record AS dreamRecord
                  FROM sleep_cycle AS s
                  INNER JOIN users AS u
                  ON s.user_id = u.id
                  WHERE u.id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId]);

        $logsViewData = new LogsViewData();
        $logsViewData->setLogs(function () use ($stmt) {
            while ($log = $stmt->fetchObject(Log::class)) {
                yield $log;
            }
        });

        return $logsViewData;
    }
}