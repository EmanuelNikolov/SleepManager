<?php

namespace Adapter;


class PDODatabase implements DatabaseInterface
{

    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(
      $dbHost,
      $dbName,
      $dbUser,
      $dbPass
    ) {
        $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName . ';charset=utf8';
        $this->pdo = new \PDO($dsn, $dbUser, $dbPass);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function prepare(string $query): DatabaseStatementInterface
    {
        return new PDODatabaseStatement($this->pdo->prepare($query));
    }

    public function errorInfo()
    {
        return $this->pdo->errorInfo();
    }
}